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

class Solution
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