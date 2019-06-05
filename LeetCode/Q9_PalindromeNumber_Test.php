<?php
namespace LeetCode\Q9;
use PHPUnit\Framework\TestCase;

class Q9_PalindromeNumber_Test extends TestCase
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
        $x = 121;
        $response = $this->solution->isPalindrome($x);
        $this->assertTrue($response);
    }

    public function testSample2()
    {
        $x = -121;
        $response = $this->solution->isPalindrome($x);
        $this->assertFalse($response);
    }

    public function testSample3()
    {
        $x = 10;
        $response = $this->solution->isPalindrome($x);
        $this->assertFalse($response);
    }

    public function testBoundary1()
    {
        $x = 0;
        $response = $this->solution->isPalindrome($x);
        $this->assertTrue($response);
    }

    public function testBoundary2()
    {
        $x = 9;
        $response = $this->solution->isPalindrome($x);
        $this->assertTrue($response);
    }
}

class Solution
{
    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x)
    {
        // 有負數一定不是回文
        if ($x < 0) {
            return false;
        }

        // 切位數
        $bit_array = [];
        do {
            $bit_array[] = $x % 10;
            $x = intval($x / 10);
        } while ($x > 0);

        // 看是否是回文
        $cnt = count($bit_array);
        for ($i=0; $i < intval($cnt / 2) + 1; $i++) {
            if ($bit_array[$i] != $bit_array[$cnt - $i - 1]) {
                return false;
            }
        }

        return true;
    }
}