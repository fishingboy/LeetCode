<?php
namespace LeetCode\Q28;
use PHPUnit\Framework\TestCase;

class Q28_ImplementStrStr_Test extends TestCase
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
        // Input: haystack = "hello", needle = "ll"
        // Output: 2
        $haystack = "hello";
        $needle = "ll";
        $response = $this->solution->strStr($haystack, $needle);
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        // Input: haystack = "aaaaa", needle = "bba"
        // Output: -1
        $haystack = "aaaaa";
        $needle = "bba";
        $response = $this->solution->strStr($haystack, $needle);
        $this->assertEquals(-1, $response);
    }

    public function testWrongAnswer1()
    {
        $haystack = "";
        $needle = "";
        $response = $this->solution->strStr($haystack, $needle);
        $this->assertEquals(0, $response);
    }
}

class Solution
{
    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle)
    {
        if ($needle === "") {
            return 0;
        }
        $pos = strpos($haystack, $needle);
        return $pos === false ? -1 : $pos;
    }
}