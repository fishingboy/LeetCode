<?php
namespace LeetCode\Q128;
use PHPUnit\Framework\TestCase;

class Q128_LongestConsecutiveSequence_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->longestConsecutive($test['args']['nums']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestConsecutive($nums)
    {
        if (count($nums) == 0) {
            return 0;
        }

        $nums = array_unique($nums);
        sort($nums);
        $longest = 0;
        $min = $max = $prev = null;
        foreach ($nums as $num) {
            if ($prev === null) {
                $min = $max = $prev = $num;
            } else if ($num == $prev + 1) {
                $max = $prev = $num;
                $diff = abs($max - $min);
                if ($diff > $longest) {
                    $longest = $diff;
                }
            } else {
                $prev = $min = $max = $num;
            }
        }
        return $longest + 1;
    }
}