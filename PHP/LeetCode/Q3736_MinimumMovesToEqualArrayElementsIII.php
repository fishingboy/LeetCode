<?php
namespace LeetCode\Q2729;
use PHPUnit\Framework\TestCase;

class Q3736_MinimumMovesToEqualArrayElementsIII extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->minMoves($test['args']['nums']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function minMoves($nums) {
        $sum = 0;
        $max = 0;
        foreach ($nums as $num) {
            $sum += $num;
            if ($num > $max) {
                $max = $num;
            }
        }
        return $max * count($nums) - $sum;
    }
}