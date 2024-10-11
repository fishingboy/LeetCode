<?php
namespace LeetCode\Q118;
use PHPUnit\Framework\TestCase;

class Q118_Pascal_Triangle_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->generate($test['args']['numRows']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed: " . json_encode($test));
        }
    }
}

class Solution
{
    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows)
    {
        if ($numRows == 0) {
            return [];
        }

        $answer = [[1]];
        for ($i=1; $i<$numRows; $i++) {
            for ($j=0; $j<=$i; $j++) {
                $left_num = $answer[$i-1][$j-1] ?? 0;
                $right_num = $answer[$i-1][$j] ?? 0;
                $answer[$i][$j] = $left_num + $right_num;
            }
        }
        return $answer;
    }
}