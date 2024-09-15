<?php
namespace LeetCode\Q58;
use PHPUnit\Framework\TestCase;

class Q58_LengthOfLastWord_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->lengthOfLastWord($test['args']['s']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s)
    {
        $tmp = explode(" ", trim($s));
        return strlen($tmp[count($tmp) - 1]);
    }
}