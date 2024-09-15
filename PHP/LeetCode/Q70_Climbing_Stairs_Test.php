<?php
namespace LeetCode\Q70;
use PHPUnit\Framework\TestCase;

class Q70_Climbing_Stairs_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->climbStairs($test['args']['x']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

/**
 * 費氏數列解
 * Class Solution
 * @package LeetCode\Q70
 */
class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        static $fibonacci;

        if ( ! $fibonacci) {
            $fibonacci = [1, 1];
            for ($i = 2; $i <=45; $i++) {
                $fibonacci[$i] = $fibonacci[$i-1] + $fibonacci[$i-2];
            }
        }

        return $fibonacci[$n];
    }
}

/**
 * 遞迴版解答(時間會過長，不過已經證明該解答為費氏數列)
 * Class Solution_Recursive
 * @package LeetCode\Q70
 */
class Solution_Recursive
{
    private $solutions = 0;
    /**
     * @param Integer $n
     * @return Integer
     */
    function climbStairs($n)
    {
        $this->solutions = 0;

        $this->climb($n);

        return $this->solutions;
    }

    private function climb(int $n)
    {
        if ($n == 0) {
            $this->solutions++;
        } else if ($n == 1) {
            $this->solutions++;
        } else if ($n >= 2) {
            $this->climb($n -1);
            $this->climb($n -2);
        }
    }
}