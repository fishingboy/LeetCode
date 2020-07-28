<?php

namespace LeetCode\Q1518;

use PHPUnit\Framework\TestCase;

class Q1518_WaterBottles_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function test_sample1()
    {
        $numBottles = 9;
        $numExchange = 3;
        $response = $this->solution->numWaterBottles($numBottles, $numExchange);
        $this->assertEquals(13, $response);
    }

    public function test_sample2()
    {
        $numBottles = 15;
        $numExchange = 4;
        $response = $this->solution->numWaterBottles($numBottles, $numExchange);
        $this->assertEquals(19, $response);
    }

    public function test_sample3()
    {
        $numBottles = 5;
        $numExchange = 5;
        $response = $this->solution->numWaterBottles($numBottles, $numExchange);
        $this->assertEquals(6, $response);
    }

    public function test_sample4()
    {
        $numBottles = 2;
        $numExchange = 3;
        $response = $this->solution->numWaterBottles($numBottles, $numExchange);
        $this->assertEquals(2, $response);
    }
}

class Solution
{
    /**
     * @param Integer $numBottles
     * @param Integer $numExchange
     * @return Integer
     */
    function numWaterBottles($numBottles, $numExchange)
    {
        $total = 0;
        $empty_bottles = 0;
        while ($numBottles > 0) {
            $total += $numBottles;
            $empty_bottles += $numBottles;
            $numBottles = intval($empty_bottles / $numExchange);
            $empty_bottles = $empty_bottles % $numExchange;
        }
        return $total;
    }
}