<?php
namespace LeetCode\Q5;
use PHPUnit\Framework\TestCase;

/**
 * Longest Palindromic Substring
 */
class Q5_LongestPalindromicSubstring_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->longestPalindrome($test['args']['s']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
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