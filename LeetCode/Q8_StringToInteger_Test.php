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
}

class Solution
{
    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str)
    {
        return intval($str);
    }
}