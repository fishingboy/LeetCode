<?php

namespace LeetCode\Q1470;

use PHPUnit\Framework\TestCase;

class Q1470_ShuffleTheArray_Test extends TestCase
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
        $nums = [2,5,1,3,4,7]; $n = 3;
        $response = $this->solution->shuffle($nums, $n);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([2,3,5,4,1,7], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer[]
     */
    function shuffle($nums, $n)
    {
        $answer = array_pad([], $n*2, 0);
        foreach ($nums as $i => $num) {
            if ($i < $n) {
                $answer[2 * $i] = $num;
            } else {
                $answer[2 * ($i-$n) + 1] = $num;
            }
        }

        return $answer;
    }
}