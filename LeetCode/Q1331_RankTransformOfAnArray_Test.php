<?php

namespace LeetCode\Q1331;

use PHPUnit\Framework\TestCase;

class Q1331_RankTransformOfAnArray_Test extends TestCase
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
        $arr = [40,10,20,30];
        $response = $this->solution->arrayRankTransform($arr);
        $this->assertArraySubset([4,1,2,3], $response);
    }

    public function test_sample2()
    {
        $arr = [100, 100, 100];
        $response = $this->solution->arrayRankTransform($arr);
        $this->assertArraySubset([1,1,1], $response);
    }

    public function test_sample3()
    {
        $arr = [37,12,28,9,100,56,80,5,12];
        $response = $this->solution->arrayRankTransform($arr);
        $this->assertArraySubset([5,3,4,2,8,6,7,1,3], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function arrayRankTransform($arr)
    {
        // 取出不重覆的陣列
        $unique_arr = array_unique($arr);

        // 排名次
        $count = count($unique_arr);
        $rank = array_pad([], $count, $count);
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($unique_arr[$i] < $unique_arr[$j]) {
                    $rank[$i]--;
                }
                if ($unique_arr[$i] > $unique_arr[$j]) {
                    $rank[$j]--;
                }
            }
        }

        // 把值對應回名次
        $rank_map = [];
        foreach ($unique_arr as $i => $item) {
            $rank_map[$item] = $rank[$i];
        }

        // 把原本的陣列轉回名次
        $answer = [];
        foreach ($arr as $i => $item) {
            $answer[$i] = $rank_map[$item];
        }

        return $answer;
    }
}

/**
 * 這個解法在名次並排的情況下不對
 * 如果有第兩個第 1 名，就沒有第 2 名
 * (其實不是大部份名次都是這樣算的嗎？)
 * Class Solution_1
 * @package LeetCode\Q1331
 */
class Solution_1
{
    /**
     * @param Integer[] $arr
     * @return Integer[]
     */
    function arrayRankTransform($arr)
    {
        $count = count($arr);
        $rank = array_pad([], $count, $count);

        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count; $j++) {
                if ($arr[$i] < $arr[$j]) {
                    $rank[$i]--;
                }
                if ($arr[$i] > $arr[$j]) {
                    $rank[$j]--;
                }
            }
        }

        return $rank;
    }
}