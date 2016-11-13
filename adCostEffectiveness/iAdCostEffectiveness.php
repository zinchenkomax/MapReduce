<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 20:14
 */
namespace AdCostEffectiveness;

use DateTime;


/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 13.11.16
 * Time: 18:04
 */
interface iAdCostEffectiveness
{
    /**
     * @return array
     */
    public function calculate();

    /**
     * @param DateTime $date_from
     */
    public function setDateFrom(DateTime $date_from);

    /**
     * @param DateTime $date_to
     */
    public function setDateTo(DateTime $date_to);

    /**
     * @param string $campaign_name
     */
    public function setCampaignName($campaign_name);
}