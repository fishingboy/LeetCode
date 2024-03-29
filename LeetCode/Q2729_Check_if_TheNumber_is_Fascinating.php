<?php
namespace LeetCode\Q2729;
use PHPUnit\Framework\TestCase;

class Q2729_Check_if_TheNumber_is_Fascinating extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testExample1()
    {
        $n = 192;
        $response = $this->solution->isFascinating($n);
        $this->assertTrue($response);
        $n = 100;
        $response = $this->solution->isFascinating($n);
        $this->assertFalse($response);
    }
}

class Solution {

    /**
     * @param Integer $n
     * @return Boolean
     */
    function isFascinating($n) {
        $str = $n . (2 * $n) . (3 * $n);
        $list = [];
        for ($i=0; $i<9 ;$i++) {
            $s = $str[$i];
            if (isset($list[$s]) || $s == "0") {
                return false;
            }
            $list[$s] = 1;
        }
        return true;
    }
}