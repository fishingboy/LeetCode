<?php
namespace LeetCode\Q69;
use PHPUnit\Framework\TestCase;

class Q69_SQRT_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $x = 4;
        $response = $this->solution->mySqrt($x);
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        $x = 8;
        $response = $this->solution->mySqrt($x);
        $this->assertEquals(2, $response);
    }

    public function test1()
    {
        $x = 1;
        $response = $this->solution->mySqrt($x);
        $this->assertEquals(1, $response);
    }

    public function test2()
    {
        $x = 0;
        $response = $this->solution->mySqrt($x);
        $this->assertEquals(0, $response);
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