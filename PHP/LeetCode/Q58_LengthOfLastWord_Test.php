<?php
namespace LeetCode\Q58;
use PHPUnit\Framework\TestCase;

class Q58_LengthOfLastWord_Test extends TestCase
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
        $s = "hello world";
        $response = $this->solution->lengthOfLastWord($s);
        $this->assertEquals(5, $response);
    }

    public function test_hello_world_應該回傳5()
    {
        $s = "hello world";
        $response = $this->solution->lengthOfLastWord($s);
        $this->assertEquals(5, $response);
    }

    public function test_hello_moto_應該回傳4()
    {
        $s = "hello moto";
        $response = $this->solution->lengthOfLastWord($s);
        $this->assertEquals(4, $response);
    }

    public function test_空字串應該回傳0()
    {
        $s = "";
        $response = $this->solution->lengthOfLastWord($s);
        $this->assertEquals(0, $response);
    }

    public function test_wa1()
    {
        $s = "a ";
        $response = $this->solution->lengthOfLastWord($s);
        $this->assertEquals(1, $response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s)
    {
        $tmp = explode(" ", trim($s));
        return strlen($tmp[count($tmp) - 1]);
    }
}