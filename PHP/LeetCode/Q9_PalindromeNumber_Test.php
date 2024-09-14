<?php
namespace LeetCode\Q9;
use PHPUnit\Framework\TestCase;

class Q9_PalindromeNumber_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->isPalindrome($test['args']['x']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        // 有負數一定不是回文
        if ($x < 0) {
            return false;
        }

        // 切位數
        $bit_array = [];
        do {
            $bit_array[] = $x % 10;
            $x = intval($x / 10);
        } while ($x > 0);

        // 看是否是回文
        $cnt = count($bit_array);
        for ($i=0; $i < intval($cnt / 2) + 1; $i++) {
            if ($bit_array[$i] != $bit_array[$cnt - $i - 1]) {
                return false;
            }
        }

        return true;
    }
}