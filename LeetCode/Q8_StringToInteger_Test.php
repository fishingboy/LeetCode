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

    public function test_WA3()
    {
        $s = "words and 987";
        $response = $this->solution->myAtoi($s);
        $this->assertEquals(0, $response);
    }

    public function test_WA4()
    {
        $s = "0  123";
        $response = $this->solution->myAtoi($s);
        $this->assertEquals(0, $response);
    }

    public function test_WA5()
    {
        $s = " b11228552307";
        $response = $this->solution->myAtoi($s);
        $this->assertEquals(0, $response);
    }

    public function test_getNumberString()
    {
        $this->assertEquals("-115579378", $this->solution->getNumberString("   -115579378e25"));
        $this->assertEquals("", $this->solution->getNumberString("words and 987"));
    }
}

class Solution
{
    /**
     * @var int
     */
    private $min;

    /**
     * @var int
     */
    private $max;

    public function __construct()
    {
        $this->min = - 1 * pow(2, 31);
        $this->max = pow(2, 31) -1;
    }

    /**
     * @param String $str
     * @return Integer
     */
    public function myAtoi(string $str): int
    {
        $number_str = $this->getNumberString($str);

        $answer = intval($number_str);
        if ($answer > $this->max) {
            return $this->max;
        } else if ($answer < $this->min) {
            return $this->min;
        } else {
            return $answer;
        }
    }

    public function getNumberString($str)
    {
        $word = "";
        $count = 0;
        for ($i=0; $i <strlen($str) && $count < 2; $i++) {
            if ($str[$i] == ' ') {
                if ($word != "") {
                    if (preg_match("/^[\-0-9.+]+/", $word, $matches)) {
                        return $matches[0];
                    }
                    $word = "";
                    $count++;
                }
            } else {
                $word .= $str[$i];
            }
        }

        if (preg_match("/^[\-0-9.+]+/", $word, $matches)) {
            return $matches[0];
        } else {
            return "";
        }
    }
}