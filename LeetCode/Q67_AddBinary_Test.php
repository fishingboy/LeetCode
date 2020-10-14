<?php
namespace LeetCode\Q67;
use PHPUnit\Framework\TestCase;

class Q67_AddBinary_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function test_binaryToInt()
    {
        $a = "11";
        $response = $this->solution->binaryToInt($a);
        $this->assertEquals(3, $response);

        $a = "101";
        $response = $this->solution->binaryToInt($a);
        $this->assertEquals(5, $response);
    }

    public function test_intToBinary()
    {
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