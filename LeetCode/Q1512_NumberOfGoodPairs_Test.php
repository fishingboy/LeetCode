<?php

namespace LeetCode\Q1512;

use PHPUnit\Framework\TestCase;

class Q1512_NumberOfGoodPairs_Test extends TestCase
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
        $nums = [1,2,3,1,1,3];
        $response = $this->solution->numIdenticalPairs($nums);
        $this->assertEquals(4, $response);
    }

    public function test_sample2()
    {
        $nums = [1,1,1,1];
        $response = $this->solution->numIdenticalPairs($nums);
        $this->assertEquals(6, $response);
    }

    public function test_sample3()
    {
        $nums = [1,2,3];
        $response = $this->solution->numIdenticalPairs($nums);
        $this->assertEquals(0, $response);
    }

    public function test_1()
    {
        $nums = [1];
        $response = $this->solution->numIdenticalPairs($nums);
        $this->assertEquals(0, $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function numIdenticalPairs($nums)
    {
        $answer = 0;
        $count = count($nums);
        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($nums[$i] == $nums[$j]) {
                    $answer++;
                }
            }
        }
        return $answer;
    }
}