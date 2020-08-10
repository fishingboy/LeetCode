<?php

namespace LeetCode\Q1480;

use PHPUnit\Framework\TestCase;

class Q1480_RunningSumOf1dArray_Test extends TestCase
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
        $nums = [1,2,3,4];
        $response = $this->solution->runningSum($nums);
        $this->assertArraySubset([1,3,6,10], $response);
    }

    public function test_sample2()
    {
        $nums = [1,1,1,1,1];
        $response = $this->solution->runningSum($nums);
        $this->assertArraySubset([1,2,3,4,5], $response);
    }

    public function test_sample3()
    {
        $nums = [3,1,2,10,1];
        $response = $this->solution->runningSum($nums);
        $this->assertArraySubset([3,4,6,16,17], $response);
    }

    public function test_1()
    {
        $nums = [3];
        $response = $this->solution->runningSum($nums);
        $this->assertArraySubset([3], $response);
    }

    public function test_2()
    {
        $nums = [];
        $response = $this->solution->runningSum($nums);
        $this->assertArraySubset([], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function runningSum($nums)
    {
        $sum_array = [];
        $total = 0;
        foreach ($nums as $i => $num) {
            $sum_array[$i] = $num + $total;
            $total = $sum_array[$i];
        }
        return $sum_array;
    }
}