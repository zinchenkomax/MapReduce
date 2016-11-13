<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 19:35
 */

namespace AdCostEffectiveness;


class Mapper
{

    /**
     * Точность вычислений
     * @var int
     */
    private $accuracy = 10;



    /**
     * Mapper constructor.
     * @param null $accuracy
     */
    public function __construct( $accuracy = null )
    {
        if( ! is_null( $accuracy ) ){
            $this->accuracy = $accuracy;
        }
    }


    /**
     * @param AdCostRow $primal_data_row
     * @return array
     */
    public function map( AdCostRow $primal_data_row )
    {
        $transaction_cost = round(
            $primal_data_row->revenue / $primal_data_row->transactions,
            $this->accuracy
        );

        return [
            $primal_data_row->campaign_name,
            $transaction_cost,
        ];
    }


}