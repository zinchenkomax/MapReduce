<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 20:23
 */
namespace AdCostEffectiveness;

interface iPrimalDataLoader
{
    /**
     * @return AdCostRow[]
     */
    function load();
}