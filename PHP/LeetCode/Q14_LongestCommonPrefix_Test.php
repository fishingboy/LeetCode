<?php
namespace LeetCode\Q14;
use PHPUnit\Framework\TestCase;

class Q14_LongestCommonPrefix_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->longestCommonPrefix($test['args']['strs']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
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
        $count = count($strs);
        if ($count == 1) {
            return $strs[0];
        }

        $first_len = strlen($strs[0]);

        $answer = "";
        for ($i=0; $i<$first_len; $i++) {
            for ($j = 1; $j < $count; $j++) {
                if ($strs[$j][$i] != $strs[0][$i]) {
                    break 2;
                }
            }

            if ($j == $count) {
                $answer .= $strs[0][$i];
            }
        }

        return $answer;
    }
}