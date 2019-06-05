<?php
namespace LeetCode\Q7;
use PHPUnit\Framework\TestCase;

class Q7_ReverseInteger_Test extends TestCase
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
        $x = 123;
        $response = $this->solution->reverse($x);
        $this->assertEquals(321, $response);
    }

    public function testSample2()
    {
        $x = -123;
        $response = $this->solution->reverse($x);
        $this->assertEquals(-321, $response);
    }

    public function testSample3()
    {
        $x = 120;
        $response = $this->solution->reverse($x);
        $this->assertEquals(21, $response);
    }

    public function testBoundary1()
    {
        $x = 1;
        $response = $this->solution->reverse($x);
        $this->assertEquals(1, $response);
    }

    public function testBoundary2()
    {
        $x = 0;
        $response = $this->solution->reverse($x);
        $this->assertEquals(0, $response);
    }
}

class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $sign = ($x < 0) ? -1 : 1;
        $str = "" . abs($x);
        $new_x = "";

        $len = strlen($str);
        for ($i = $len - 1; $i >= 0; $i--) {
            $new_x .= $str[$i];
        }
        return $sign * $new_x;
    }
}