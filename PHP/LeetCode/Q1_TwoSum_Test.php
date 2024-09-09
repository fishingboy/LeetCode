<?php
namespace LeetCode\Q1;
use PHPUnit\Framework\TestCase;

/**
 * Two Sum
 *
 * difficulty: Easy
 * tag: 陣列
 * status: Accepted
 */
class Q1_TwoSum_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $tests = json_decode(file_get_contents( './TestData/Q1.json'), true);
        foreach ($tests as $test) {
            $response = $solution->twoSum($test['args']['nums'], $test['args']['target']);
            $this->assertEquals($test['expected'], $response);
        }
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