<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 20:04
 */

namespace AdCostEffectiveness;


class Reducer
{


    /**
     * Точность вычислений
     * @var int
     */
    private $accuracy = 10;


    /**
     * Reducer constructor.
     * @param null $accuracy
     */
    public function __construct( $accuracy = null )
    {
        if( ! is_null( $accuracy ) ){
            $this->accuracy = $accuracy;
        }
    }


    /**
     * @param array $merged_data
     * @return array
     */
    public function reduce( array $merged_data )
    {
        $reduced_data = [];
        foreach ( $merged_data as $campaign_name => $campaign_transaction_cost_list) {
            $reduced_data[ $campaign_name ] = round(
                array_sum( $campaign_transaction_cost_list ) / count( $campaign_transaction_cost_list ),
                $this->accuracy
            );
        }

        return $reduced_data;
    }
}