<?php
namespace LeetCode\Q3;
use PHPUnit\Framework\TestCase;

class Q3_LongestSubstring_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }
    
    public function testSample()
    {
        // Input: "abcabcbb"
        // Output: 3
        $s = "abcabcbb";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(3, $response);
    }

    public function testSample2()
    {
        // Input: "bbbbb"
        // Output: 1
        $s = "bbbbb";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(1, $response);
    }

    public function testSample3()
    {
        // Input: "pwwkew"
        // Output: 3
        $s = "pwwkew";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(3, $response);
    }
}

class Solution
{
    /**
     * @param String $str
     * @return Integer
     */
    public function lengthOfLongestSubstring($str)
    {
        $len = strlen($str);
        $max = 0;
        for ($i = 0 ; $i <= $len-2; $i++) {
            for ($j = $i + 1 ; $j <= $len-1; $j++) {
                if ($str[$i] == $str[$j]) {
                    $sub_len = $j - $i;
                    if ($sub_len > $max) {
                        $max = $sub_len;
                    }
                    break;
                }
            }
        }
        return $max;
    }
}