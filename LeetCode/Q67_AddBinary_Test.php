<?php
namespace LeetCode\Q67;
use PHPUnit\Framework\TestCase;

/**
 * 就是二進位版的大數運算
 * Class Q67_AddBinary_Test
 * @package LeetCode\Q67
 */
class Q67_AddBinary_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function test_binaryToInt()
    {
        $this->solution = new Solution_fail();

        $a = "11";
        $response = $this->solution->binaryToInt($a);
        $this->assertEquals(3, $response);

        $a = "101";
        $response = $this->solution->binaryToInt($a);
        $this->assertEquals(5, $response);
    }

    public function test_intToBinary()
    {
        $this->solution = new Solution_fail();

        $a = 5;
        $response = $this->solution->intToBinary($a);
        $this->assertEquals("101", $response);

        $a = 3;
        $response = $this->solution->intToBinary($a);
        $this->assertEquals("11", $response);

        $a = 8;
        $response = $this->solution->intToBinary($a);
        $this->assertEquals("1000", $response);
    }

    public function testSample1()
    {
        $a = "11";
        $b = "1";
        $response = $this->solution->addBinary($a, $b);
        $this->assertEquals("100", $response);
    }

    public function testSample2()
    {
        $a = "1010";
        $b = "1011";
        $response = $this->solution->addBinary($a, $b);
        $this->assertEquals("10101", $response);
    }

    public function test_wa1()
    {
        $a = "0";
        $b = "0";
        $response = $this->solution->addBinary($a, $b);
        $this->assertEquals("0", $response);
    }
}

class Solution
{
    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b)
    {
        $a_len = strlen($a);
        $b_len = strlen($b);

        $max = max($a_len, $b_len);
        $remaining = 0;

        $answer = "";
        for ($i=1; $i<=$max; $i++) {
            $a_bit = $b_bit = 0;
            if ($i <= $a_len) {
                $a_bit = intval($a[$a_len - $i]);
            }
            if ($i <= $b_len) {
                $b_bit = intval($b[$b_len - $i]);
            }

            $sum = $a_bit + $b_bit + $remaining;
            $answer =  ($sum % 2) . $answer;

            $remaining = intval($sum / 2);
        }
        if ($remaining) {
            $answer = $remaining . $answer;
        }

        return $answer;
    }
}

/**
 * 要用大數運算的概念去做，不能轉成整數會爆掉
 * Class Solution_fail
 * @package LeetCode\Q67
 */
class Solution_fail
{
    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    function addBinary($a, $b)
    {
        return $this->intToBinary($this->binaryToInt($a) + $this->binaryToInt($b));
    }

    public function binaryToInt(string $a)
    {
        $length = strlen($a);
        $total = 0;
        for ($i=0; $i<$length; $i++) {
            if ($a[$i] == "1") {
                $total += pow(2, $length - $i - 1);
            }
        }
        return $total;
    }

    public function intToBinary(int $a)
    {
        if ($a == 0) {
            return "0";
        }

        $answer = "";
        while ($a > 0) {
            $remaining = $a % 2;
            $a = intval($a / 2);
            $answer = $remaining . $answer;
        }
        return $answer;
    }
}

/**
 * Next challenges:
 * https://leetcode.com/problems/multiply-strings/
 * https://leetcode.com/problems/add-to-array-form-of-integer/
 */