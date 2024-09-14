<?php
namespace LeetCode\Q35;
use PHPUnit\Framework\TestCase;

class Q35_SearchInsertPosition_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->searchInsert($test['args']['nums'], $test['args']['target']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        $low = 0; $high = count($nums);

        if ($target <= $nums[0]) {
            return 0;
        } else if ($target > $nums[$high - 1]) {
            return $high;
        }

        while ($low <= $high) {
            $middle = intval(($low + $high) / 2);

            if ($nums[$middle-1] < $target && $target <= $nums[$middle]) {
                return $middle;
            } else if ($target > $nums[$middle]) {
                $low = $middle;
            } else {
                $high = $middle;
            }
        }
    }
}