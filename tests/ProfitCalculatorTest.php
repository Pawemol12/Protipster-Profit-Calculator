<?php
require_once dirname(dirname(__FILE__)) . '../ProfitCalculator.php';

use PHPUnit\Framework\TestCase;


class ProfitCalculatorTest extends TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function testCalculate(float $stake, float $odds, int $tipStatus, float $expected): void
    {
        $this->assertSame($expected, ProfitCalculator::calculate($stake, $odds, $tipStatus));
    }

    public function dataProvider()
    {
        return [
            'testWon1'  => [100, 1.50, CommonPicksProvider::WON, 50],
            'testLost1'  => [(float) CommonPicksProvider::$picks[0]['stake'], (float) CommonPicksProvider::$picks[0]['odd'], CommonPicksProvider::$picks[0]['status'], -1],
            'testWon2'  => [(float) CommonPicksProvider::$picks[1]['stake'], (float) CommonPicksProvider::$picks[1]['odd'], CommonPicksProvider::$picks[1]['status'], 5],
            'testHalfWon1'  => [(float) CommonPicksProvider::$picks[2]['stake'], (float) CommonPicksProvider::$picks[2]['odd'], CommonPicksProvider::$picks[2]['status'], 3.65],
            'testHalfLost1'  => [(float) CommonPicksProvider::$picks[3]['stake'], (float) CommonPicksProvider::$picks[3]['odd'], CommonPicksProvider::$picks[3]['status'], -1],
            'testVoided1'  => [(float) CommonPicksProvider::$picks[4]['stake'], (float) CommonPicksProvider::$picks[4]['odd'], CommonPicksProvider::$picks[4]['status'], 0],
            'testWon3'  => [(float) CommonPicksProvider::$picks[5]['stake'], (float) CommonPicksProvider::$picks[5]['odd'], CommonPicksProvider::$picks[5]['status'], 16.05],
            'testWon4'  => [100, 2, CommonPicksProvider::WON, 100],
        ];
    }
}