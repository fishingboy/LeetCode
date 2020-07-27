<?php
namespace LeetCode\Q14;
use PHPUnit\Framework\TestCase;

class Q14_LongestCommonPrefix_Test extends TestCase
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
        $strs = ["flower","flow","flight"];
        $response = $this->solution->longestCommonPrefix($strs);
        $this->assertEquals("fl", $response);
    }

    public function test_sample2()
    {
        $strs = ["dog","racecar","car"];
        $response = $this->solution->longestCommonPrefix($strs);
        $this->assertEquals("", $response);
    }

    public function test_wa1()
    {
        $strs = ["a"];
        $response = $this->solution->longestCommonPrefix($strs);
        $this->assertEquals("a", $response);
    }

    public function test_wa2()
    {
        $strs = ["a","b"];
        $response = $this->solution->longestCommonPrefix($strs);
        $this->assertEquals("", $response);
    }
}

class Solution
{
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs)
    {
        $answer = "";
        $first_len = strlen($strs[0]);
        $count = count($strs);

        if ($count == 1) {
            return $strs[0];
        }

        for ($i=0; $i<$first_len; $i++) {
            for ($j = 1; $j < $count; $j++) {
                if ($strs[$j][$i] != $strs[0][$i]) {
                    break;
                }
            }

            if ($j == $count) {
                $answer .= $strs[0][$i];
            }
        }

        return $answer;
    }
}