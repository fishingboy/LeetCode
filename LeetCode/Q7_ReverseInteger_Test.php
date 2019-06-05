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

    // Input
    // 1534236469
    // Output
    // 9646324351
    // Expected
    // 0
    public function testWa1()
    {
        $x = 1534236469;
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

        // 反轉
        $len = strlen($str);
        for ($i = $len - 1; $i >= 0; $i--) {
            $new_x .= $str[$i];
        }

        // 判斷溢位
        $v = $sign * $new_x;
        if ($v > 2147483647 || $v < -2147483648) {
            return 0;
        } else {
            return $v;
        }
    }
}