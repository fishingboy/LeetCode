<?php

namespace LeetCode\Q1365;

use PHPUnit\Framework\TestCase;

class Q1365_HowManyNumbersAreSmallerThanTheCurrentNumber_Test extends TestCase
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
       $nums = [8,1,2,2,3];
        $response = $this->solution->smallerNumbersThanCurrent($nums);
        $this->assertArraySubset([4,0,1,1,3], $response);
    }

    public function test_sample2()
    {
        $nums = [7,7,7,7];
        $response = $this->solution->smallerNumbersThanCurrent($nums);
        $this->assertArraySubset([0,0,0,0], $response);
    }

    public function test_boundary1()
    {
        $nums = [7];
        $response = $this->solution->smallerNumbersThanCurrent($nums);
        $this->assertArraySubset([0], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallerNumbersThanCurrent($nums)
    {
        // 統計每個數字的數量
        $count_nums = [];
        foreach ($nums as $num) {
            if (isset($count_nums[$num])) {
                $count_nums[$num]["count"]++;
            } else {
                $count_nums[$num] = [
                    "count" => 1,
                    "num" => $num,
                ];
            }
        }

        // 排序
        usort($count_nums, function ($a, $b) {
            return $b['num'] <=> $a['num'];
        });

        // 計算答案
        $count = count($nums);
        $less_nums = [];
        foreach ($count_nums as $count_num) {
            $count -= $count_num['count'];
            $less_nums[$count_num['num']] = $count;
        }

        // 把答案對應回去
        $answer_nums = [];
        foreach ($nums as $num) {
            $answer_nums[] = $less_nums[$num];
        }

        return $answer_nums;
    }
}