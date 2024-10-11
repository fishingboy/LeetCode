<?php
namespace LeetCode\Q125;
use PHPUnit\Framework\TestCase;

class Q125_ValidPalindrome_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->isPalindrome($test['args']['s']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed" . json_encode($test));
        }
    }

    public function test_convertString()
    {
        $solution = new Solution();
        $s = "A man, a plan,";
        $response = $solution->convertString($s);
        $this->assertEquals("AMANAPLAN", $response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function isPalindrome($s)
    {
        $s = $this->convertString($s);

        $len = strlen($s);
        for ($i=0; $i<$len; $i++) {
            $back_i = $len - $i - 1;
            if ($back_i < $i) {
                break;
            }
            if ($s[$i] != $s[$back_i]) {
                return false;
            }
        }

        return true;
    }

    public function convertString(string $s)
    {
        $s = strtoupper($s);
        $output = "";
        $len = strlen($s);
        for ($i=0; $i<$len; $i++) {
            if (preg_match("/[0-9A-Z]/", $s[$i])) {
                $output .= $s[$i];
            }
        }
        return $output;
    }
}