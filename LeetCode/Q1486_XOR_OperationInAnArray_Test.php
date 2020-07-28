<?php

namespace LeetCode\Q1486;

use PHPUnit\Framework\TestCase;

class Q1486_XOR_OperationInAnArray_Test extends TestCase
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
        $n = 5;
        $start = 0;
        $response = $this->solution->xorOperation($n, $start);
        $this->assertEquals(8, $response);
    }

    public function test_sample2()
    {
        $n = 4;
        $start = 3;
        $response = $this->solution->xorOperation($n, $start);
        $this->assertEquals(8, $response);
    }
}

class Solution
{
    /**
     * @param Integer $n
     * @param Integer $start
     * @return Integer
     */
    function xorOperation($n, $start)
    {
        $answer = $start;
        for ($i=1; $i<$n; $i++) {
            $x = $start + ($i * 2);
            $answer ^= $x;
        }
        return $answer;
    }
}