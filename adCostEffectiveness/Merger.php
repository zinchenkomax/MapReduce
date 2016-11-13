<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 19:58
 */

namespace AdCostEffectiveness;


class Merger
{


    /**
     * @param array $mapped_data
     * @return array
     */
    public function merge( array $mapped_data )
    {
        $merged_data = [];
        foreach ( $mapped_data as $mapped_row) {
            list( $campaign_name, $transaction_cost ) = $mapped_row;
            $merged_data[ $campaign_name ][] = $transaction_cost;
        }

        return $merged_data;
    }
}