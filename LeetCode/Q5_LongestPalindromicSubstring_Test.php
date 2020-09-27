<?php
namespace LeetCode\Q5;
use PHPUnit\Framework\TestCase;

class Q5_LongestPalindromicSubstring_Test extends TestCase
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
        $s = "babad";
        $response = $this->solution->longestPalindrome($s);
        $this->assertEquals("bab", $response);
    }

    public function test_1()
    {
        $s = "baabad";
        $response = $this->solution->longestPalindrome($s);
        $this->assertEquals("baab", $response);
    }

    public function test_wa1()
    {
        $s = "abbc";
        $response = $this->solution->longestPalindrome($s);
        $this->assertEquals("bb", $response);
    }

    public function test_wa2()
    {
        $s = "cbbd";
        $response = $this->solution->longestPalindrome($s);
        $this->assertEquals("bb", $response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    function longestPalindrome($s)
    {
        $len = strlen($s);
        $max = 0;
        $answer = "";

        // 找奇數個迴文
        for ($i=0; $i<$len; $i++) {
            $str = $s[$i];
            $curr_length = 1;
            if ($curr_length > $max) {
                $max = $curr_length;
                $answer = $str;
            }
            for ($j=1; ;$j++) {
                $left = $i - $j;
                $right = $i + $j;
                if ($left < 0 || $right >= $len) {
                    break;
                }
                if ($s[$left] != $s[$right]) {
                    break;
                }
                $curr_length += 2;
                $str =  $s[$left] . $str . $s[$right];
                if ($curr_length > $max) {
                    $max = $curr_length;
                    $answer = $str;
                }
            }
        }

        // 找奇數個迴文
        for ($i=1; $i<$len; $i++) {
            if ($s[$i-1] != $s[$i]) {
                continue;
            }
            $str = $s[$i-1] . $s[$i];
            $curr_length = 2;
            if ($curr_length > $max) {
                $max = $curr_length;
                $answer = $str;
            }
            for ($j=1; ;$j++) {
                $left = $i -1 - $j;
                $right = $i + $j;
                if ($left < 0 || $right >= $len) {
                    break;
                }
                if ($s[$left] != $s[$right]) {
                    break;
                }
                $curr_length += 2;
                $str =  $s[$left] . $str . $s[$right];
                if ($curr_length > $max) {
                    $max = $curr_length;
                    $answer = $str;
                }
            }
        }
        return $answer;
    }
}