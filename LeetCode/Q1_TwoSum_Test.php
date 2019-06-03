<?php

use PHPUnit\Framework\TestCase;

class Q1_TwoSum_Test extends TestCase
{
    public function testSample()
    {
        $solution = new Solution();
        $nums = [2, 7, 11, 15];
        $target = 9;

        $response = $solution->twoSum($nums, $target);
        $this->assertEquals([0, 1], $response);
    }

    public function testSample2()
    {
        $solution = new Solution();
        $nums = [2, 7, 11, 15];
        $target = 18;

        $response = $solution->twoSum($nums, $target);
        $this->assertEquals([1, 2], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        $num = count($nums);
        for ($i=0; $i<$num-1; $i++) {
            for ($j=$i+1; $j<$num; $j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
        return [0, 0];
    }
}