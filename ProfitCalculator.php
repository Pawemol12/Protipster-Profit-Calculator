<?php
require_once './CommonPicksProvider.php';

/**
 * Class that calculate profit or loss
 *
 * @author Paweł Lodzik <Pawemol12@gmail.com>
 */
class ProfitCalculator {
    
    /**
     * Static method dhad count either profit or loss
     * 
     * @param float $stake
     * @param float $odds
     * @param int $tipStatus
     * @return float
     */
    public static function calculate(float $stake, float $odds, int $tipStatus): float 
    {
        switch($tipStatus) {
            case CommonPicksProvider::WON: {
                return $stake * $odds - $stake;
            }
            case CommonPicksProvider::HALF_WON: {
                return ($stake * $odds - $stake) / 2;
            }
            case CommonPicksProvider::LOST: {
                return -$stake;
            }
            case CommonPicksProvider::HALF_LOST: {
                return -($stake/2);
            }
        }
        
        //Void bet or not defined tip Status
        
        return 0;
    }
    
}
