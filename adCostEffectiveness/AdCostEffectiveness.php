<?php

namespace AdCostEffectiveness;

use DateTime;

/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 18:04
 */
class AdCostEffectiveness implements iAdCostEffectiveness
{

    /**
     * @var AdCostRow[]
     */
    private $primal_data_list = [];

    /**
     * @var array
     */
    private $mapped_data = [];

    /**
     * @var array
     */
    private $merged_data = [];

    /**
     * @var null|DateTime
     */
    private $date_from = null;

    /**
     * @var null|DateTime
     */
    private $date_to = null;

    /**
     * @var null|string
     */
    private $campaign_name = null;


    /**
     * MapReduce constructor.
     * @param AdCostRow[] $primal_data_list
     *
     * В нашем упрощенном варианте конструктор принимает массив исходных данных готовый к обработке.
     * Если массив не помещается в память, то тогда в качестве параметра
     * может передаваться путь к папке с файлами, содержащими исходные данные
     *
     */
    public function __construct( array $primal_data_list )
    {
        $this->primal_data_list = $primal_data_list;
    }


    /**
     * @return array
     */
    public function calculate(){

        $this->map();
        $this->merge();

        return $this->reduce();
    }


    /**
     * @param DateTime $date_from
     */
    public function setDateFrom( DateTime $date_from ){
        $this->date_from = $date_from;
    }


    /**
     * @param DateTime $date_to
     */
    public function setDateTo( DateTime $date_to ){
        $this->date_to = $date_to;
    }


    /**
     * @param string $campaign_name
     */
    public function setCampaignName( $campaign_name ){
        $this->campaign_name = $campaign_name;
    }


    /**
     *
     */
    private function map()
    {
        $mapper = new Mapper();

        foreach ($this->primal_data_list as $primal_data_row) {
            if ($this->is_suitable_row($primal_data_row)) {
                $this->mapped_data[] = $mapper->map($primal_data_row);
            }
        }
    }


    /**
     * @param AdCostRow $primal_data_row
     * @return bool
     */
    private function is_suitable_row( AdCostRow $primal_data_row )
    {
        $verdict = true;

        if(
            $this->date_from instanceof DateTime
            AND $primal_data_row->date < $this->date_from
        ){
            $verdict = false;
        }

        if(
            ! is_null( $this->date_to )
            AND $primal_data_row->date > $this->date_to
        ){
            $verdict = false;
        }

        if(
            ! is_null( $this->campaign_name )
            AND $primal_data_row->campaign_name != $this->campaign_name
        ){
            $verdict = false;
        }


        return $verdict;
    }


    /**
     *
     */
    private function merge()
    {
        $merger = new Merger();
        $this->merged_data = $merger->merge( $this->mapped_data );
    }


    /**
     * @return array
     */
    private function reduce()
    {
        $reducer = new Reducer();

        return $reducer->reduce( $this->merged_data );
    }

}