<?php
namespace LeetCode\Q125;
use PHPUnit\Framework\TestCase;

class Q125_ValidPalindrome_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function test_convertString()
    {
        $s = "A man, a plan,";
        $response = $this->solution->convertString($s);
        $this->assertEquals("AMANAPLAN", $response);
    }

    public function testExample1()
    {
        $s = "A man, a plan, a canal: Panama";
        $response = $this->solution->isPalindrome($s);
        $this->assertTrue($response);
    }

    public function testExample2()
    {
        $s = "race a car";
        $response = $this->solution->isPalindrome($s);
        $this->assertFalse($response);
    }

    public function test_WA1()
    {
        $s = "0P";
        $response = $this->solution->isPalindrome($s);
        $this->assertFalse($response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    public function isPalindrome($s)
    {
        $s = $this->convertString($s);

        $len = strlen($s);
        for ($i=0; $i<$len; $i++) {
            $back_i = $len - $i - 1;
            if ($back_i < $i) {
                break;
            }
            if ($s[$i] != $s[$back_i]) {
                return false;
            }
        }

        return true;
    }

    public function convertString(string $s)
    {
        $s = strtoupper($s);
        $output = "";
        $len = strlen($s);
        for ($i=0; $i<$len; $i++) {
            if (preg_match("/[0-9a-zA-Z]/", $s[$i])) {
                $output .= $s[$i];
            }
        }
        return $output;
    }
}