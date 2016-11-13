<?php
use AdCostEffectiveness\AdCostEffectiveness;
use AdCostEffectiveness\PrimalDataLoader;

/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 20:15
 */
class Example
{

    function run(){
        $data_loader = new PrimalDataLoader();
        $primal_data = $data_loader->load();
        $adCostEffectiveness = new AdCostEffectiveness( $primal_data );
        $campaign_effectiveness = $adCostEffectiveness->calculate();

        print_r( $campaign_effectiveness );
    }
}