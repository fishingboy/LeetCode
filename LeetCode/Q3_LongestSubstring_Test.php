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

    public function testWa1()
    {
        // Input
        // " "
        // Output
        // 0
        // Expected
        // 1
        $s = " ";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(1, $response);
    }

    public function testWa2()
    {
        // Input
        // "au"
        // Output
        // 0
        // Expected
        // 2
        $s = " ";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(1, $response);
    }

    public function testWa3()
    {
        // Input
        // "aab"
        // Output
        // 1
        // Expected
        // 2
        $s = "aab";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(2, $response);
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
            $sub_len = 1;
            for ($j = $i + 1 ; $j <= $len-1; $j++) {
                if ($str[$i] == $str[$j]) {
                    break;
                }
                $sub_len++;
                if ($sub_len > $max) {
                    $max = $sub_len;
                    echo substr($str, $i, $j-$i+1) . "\n";
                }
            }
            if ($sub_len > $max) {
                $max = $sub_len;
                echo substr($str, $i, $j-$i+1) . "\n";
            }
        }

        if ($max == 0) {
            $max = $len;
        }
        return $max;
    }
}