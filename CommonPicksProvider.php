<?php

/**
 * CommonPicksProvider
 *
 */
class CommonPicksProvider
{
    const LOST = 0;
    
    const WON = 1;
    
    const HALF_LOST = 2;
    
    const HALF_WON = 3;
    
    const VOIDED = 4;
    
    const PICKS_LABELS = [
        self::LOST => 'LOST',
        self::WON => 'WON',
        self::HALF_LOST => 'HALF LOST',
        self::HALF_WON => 'HALF WON',
        self::VOIDED => 'Voided',
    ];
    
    /**
     * @var array
     */
    static public $picks = array (
        0 => array (
            'stake' => '1',
            'odd' => '3.20',
            'status' => self::LOST,
        ),

        1 => array (
            'stake' => '5',
            'odd' => '2.00',
            'status' => self::WON,
        ),

        2 => array (
            'stake' => '1',
            'odd' => '8.30',
            'status' => self::HALF_WON,
        ),

        3 => array (
            'stake' => '2',
            'odd' => '5.56',
            'status' => self::HALF_LOST,
        ),

        4 => array (
            'stake' => '3',
            'odd' => '1.90',
            'status' => self::VOIDED,
        ),

        5 => array (
            'stake' => '5',
            'odd' => '4.21',
            'status' => self::WON,
        ),
    );
}