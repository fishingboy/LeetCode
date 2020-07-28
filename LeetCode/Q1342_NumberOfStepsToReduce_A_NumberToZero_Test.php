<?php

namespace LeetCode\Q1342;

use PHPUnit\Framework\TestCase;

class Q1342_NumberOfStepsToReduce_A_NumberToZero_Test extends TestCase
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
        $num = 14;
        $response = $this->solution->numberOfSteps($num);
        $this->assertEquals(6, $response);
    }

    public function test_sample2()
    {
        $num = 8;
        $response = $this->solution->numberOfSteps($num);
        $this->assertEquals(4, $response);
    }
}

class Solution
{
    /**
     * @param Integer $num
     * @return Integer
     */
    function numberOfSteps($num)
    {
        $step = 0;
        while ($num > 0) {
            if ($num % 2) {
                $num -= 1;
                $step++;
            } else {
                $num /= 2;
                $step++;
            }
        }
        return $step;
    }
}