<?php
namespace LeetCode\Q70;
use PHPUnit\Framework\TestCase;

class Q70_ClimbingStairs extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $x = 2;
        $response = $this->solution->climbStairs($x);
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        $x = 3;
        $response = $this->solution->climbStairs($x);
        $this->assertEquals(3, $response);
    }

    public function testSample3()
    {
        $x = 4;
        $response = $this->solution->climbStairs($x);
        $this->assertEquals(5, $response);
    }
    public function testSample5()
    {
        $x = 5;
        $response = $this->solution->climbStairs($x);
        $this->assertEquals(8, $response);
    }

    public function test_between_1_10()
    {
        for ($i = 1; $i<=10; $i++) {
            echo "$i ==> " . $this->solution->climbStairs($i) . "\n";
        }
        $this->assertTrue(true);
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