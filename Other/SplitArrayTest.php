<?php

namespace Other\SplitArray;

use PHPUnit\Framework\TestCase;

/**
 * I have had this problem for an interview and can't seem to wrap my mind around how to solve it. I have not found any tutorials that explains the logic behind it as well.
 * Have the function ArrayChallenge(arr), take the array of integers stored in arr which will always contain an even amount of integers, and determine how they can be split into two even sets, then return a string representation of the first set followed by the second set with each integer separated by a comma and both sets sorted in ascending order. The set that goes first is the set with smallest first integer.
 *
 * For example if arr is [16,22,35,8,20,1,21,11], then your program should output 1,11,20,35,8,16,21,22
 *
 * [16,22,35,8,20,1,21,11] sum = 134
 *
 * the sum of 1,11,20,35 is = 67 the sum of 8,16,21,22 is = 67
 * Also the size of the two arrays are equal to arr.length /2
 */
class SplitArrayTest extends TestCase
{
    public function testSampleRecursive()
    {
        $nums = [16,22,35,8,20,1,21,11];
        $solution = new SolutionRecursive();
        $response = $solution->split($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([1,11,20,35], $response);
    }

    public function testSampleDP()
    {
        $nums = [16,22,35,8,20,1,21,11];
        $solution = new SolutionDP();
        $response = $solution->split($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([1,11,20,35], $response);
    }
}

class SolutionRecursive
{
    private $answer = [];

    /**
     * 切成總合相等兩個陣列
     * @param array $nums
     * @return array
     */
    public function split(array $nums): array
    {
        // 以字母順序排序
        usort($nums, function ($a, $b) {
            return strcmp("$a",  "$b");
        });

        // 算出平均值
        $avg = array_sum($nums) / 2;

        // 找出所有組合
        $this->findAll($nums, $avg);

        // 回傳第一組答案
        return $this->answer[0] ?? [];
    }

    /**
     * 找出所有組合
     * @param array $nums   陣列
     * @param int   $sum    剩下要找的總合
     * @param array $answer 目前的答案
     * @return void
     */
    public function findAll(array $nums, int $sum = 0, array $answer = []) : void
    {
        foreach ($nums as $i => $num) {
            if ($sum == $num) {
                // 找到答案
                $answer[] = $num;
                $this->answer[] = $answer;
            } else if ($sum > $num) {
                // 繼續往下遞迴
                $new_answer = array_merge($answer, [$num]);
                $new_nums = array_slice($nums, $i + 1, count($nums) - $i - 1);
                $this->findAll($new_nums, $sum - $num, $new_answer);
            }
        }
    }
}

class SolutionDP
{
    private $answer = [];

    /**
     * 切成總合相等兩個陣列
     * @param array $nums
     * @return array
     */
    public function split(array $nums): array
    {
        // 以字母順序排序
        usort($nums, function ($a, $b) {
            return strcmp("$a",  "$b");
        });

        // 算出平均值
        $avg = array_sum($nums) / 2;

        // 找出所有組合
        $this->findAll($nums, $avg);

        // 回傳第一組答案
        return $this->answer[0] ?? [];
    }

    /**
     * 找出所有組合
     * @param array $nums   陣列
     * @param int   $sum    剩下要找的總合
     * @param array $answer 目前的答案
     * @return void
     */
    public function findAll(array $nums, int $sum = 0, array $answer = []) : void
    {
        $tmp = [];
        $count = count($nums);
        for ($i=0; $i < $count; $i++) {
            for ($j = 0; $j < $count; $j++) {
                if ($i != $j) {
                    $x = $nums[$i];
                    $y = $nums[$j];
                    $tmp[$x][$y] = $x + $y;
                }
            }
        }

        echo "<pre>tmp = " . print_r($tmp, true) . "</pre>\n";
    }
}
