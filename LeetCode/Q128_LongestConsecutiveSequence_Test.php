<?php
namespace LeetCode\Q128;
use PHPUnit\Framework\TestCase;

class Q128_LongestConsecutiveSequence_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testExample1()
    {
        $nums = [100, 4, 200, 1, 3, 2];
        $response = $this->solution->longestConsecutive($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(4, $response);
    }

    public function test_1()
    {
        $nums = [];
        $response = $this->solution->longestConsecutive($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(0, $response);
    }

    public function test_wa1()
    {
        $nums = [0,-1];
        $response = $this->solution->longestConsecutive($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(2, $response);
    }

    public function test_wa2()
    {
        $nums = [1,2,0,1];
        $response = $this->solution->longestConsecutive($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(3, $response);
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