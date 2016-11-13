<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 19:28
 */

namespace AdCostEffectiveness;


use DateTime;

class AdCostRow
{

    /**
     * @var DateTime
     */
    public $date;

    /**
     * @var string
     */
    public $campaign_name;

    /**
     * @var float
     */
    public $revenue;

    /**
     * @var int
     */
    public $transactions;
}