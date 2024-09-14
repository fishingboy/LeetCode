<?php
namespace LeetCode\Q28;
use PHPUnit\Framework\TestCase;

/**
 * Implement StrStr
 */
class Q28_ImplementStrStr_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->strStr($test['args']['haystack'], $test['args']['needle']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle)
    {
        if ($needle === "") {
            return 0;
        }
        $pos = strpos($haystack, $needle);
        return $pos === false ? -1 : $pos;
    }
}