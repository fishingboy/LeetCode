<?php
namespace LeetCode\Q69;
use PHPUnit\Framework\TestCase;

/**
 * SQRT
 */
class Q69_SQRT_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->mySqrt($test['args']['x']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    function mySqrt($x)
    {
        if ($x == 0) {
            return 0;
        }

        if ($x == 1) {
            return 1;
        }

        $i = 1;
        do {
            $i++;
            $square = $i * $i;
        } while($square < $x);
        return ($square == $x) ? $i : $i - 1;
    }
}