<?php
namespace LeetCode\Q8;
use PHPUnit\Framework\TestCase;

class Q8_StringToInteger_Test extends TestCase
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
        $s = "42";
        $response = $this->solution->myAtoi($s);
        $this->assertEquals(42, $response);
    }

    public function testSample2()
    {
        $s = "   -42";
        $response = $this->solution->myAtoi($s);
        $this->assertEquals(-42, $response);
    }

    public function testSample3()
    {
        $s = "4193 with words";
        $response = $this->solution->myAtoi($s);
        $this->assertEquals(4193, $response);
    }

    public function test_WA1()
    {
        $s = "-91283472332";
        $response = $this->solution->myAtoi($s);
        $this->assertEquals(-2147483648, $response);
    }

    public function test_WA2()
    {
        $s = "   -115579378e25";
        $response = $this->solution->myAtoi($s);
        $this->assertEquals(-115579378, $response);
    }
}

class Solution
{
    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi(string $str): int
    {
        $answer = intval($str);
        if ($answer > pow(2, 31) -1) {
            return pow(2, 31) -1;
        } else if ($answer <  - 1 * pow(2, 31)) {
            return - 1 * pow(2, 31);
        } else {
            return $answer;
        }
    }
}