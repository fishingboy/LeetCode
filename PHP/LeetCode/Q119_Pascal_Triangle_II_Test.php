<?php
namespace LeetCode\Q119;
use PHPUnit\Framework\TestCase;

class Q119_Pascal_Triangle_II_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->getRow($test['args']['rowIndex']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex)
    {
        $triangle = [[1]];
        for ($i=1; $i<=$rowIndex; $i++) {
            for ($j=0; $j<=$i; $j++) {
                $left_num = $triangle[$i-1][$j-1] ?? 0;
                $right_num = $triangle[$i-1][$j] ?? 0;
                $triangle[$i][$j] = $left_num + $right_num;
            }
        }
        return $triangle[$rowIndex];
    }
}