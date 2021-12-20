<?php

namespace LeetCode\Q1346;

use PHPUnit\Framework\TestCase;

class Q1346_CheckIfNandItsDoubleExist_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function test_sample1()
    {
        $arr = [10,2,5,3];
        $response = $this->solution->checkIfExist($arr);
        $this->assertTrue($response);
    }

    public function test_sample2()
    {
        $arr =  [7,1,14,11];
        $response = $this->solution->checkIfExist($arr);
        $this->assertTrue($response);
    }

    public function test_sample3()
    {
        $arr =  [3,1,7,11];
        $response = $this->solution->checkIfExist($arr);
        $this->assertFalse($response);
    }
}

class Solution
{
    /**
     * @param Integer[] $arr
     * @return Boolean
     */
    function checkIfExist($arr)
    {
        $half_hash = $double_hash = [];
        foreach ($arr as $item) {
            if (isset($half_hash[$item]) || isset($double_hash[$item])) {
                return true;
            }
            $half_hash[($item / 2) . ""] = 1;
            $double_hash[($item * 2) . ""] = 1;
        }
        return false;
    }
}