<?php
namespace LeetCode\Q171;
use PHPUnit\Framework\TestCase;

class Q171_ExcelSheetColumnNumber_Test extends TestCase
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
        $response = $this->solution->titleToNumber("A");
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(1, $response);
    }

    public function testSample2()
    {
        $response = $this->solution->titleToNumber("AB");
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(28,$response);
    }

    public function testSample3()
    {
        $response = $this->solution->titleToNumber("ZY");
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(701,$response);
    }

}

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function titleToNumber($s)
    {
        $mapping = [
            "A" => 1,
            "B" => 2,
            "C" => 3,
            "D" => 4,
            "E" => 5,
            "F" => 6,
            "G" => 7,
            "H" => 8,
            "I" => 9,
            "J" => 10,
            "K" => 11,
            "L" => 12,
            "M" => 13,
            "N" => 14,
            "O" => 15,
            "P" => 16,
            "Q" => 17,
            "R" => 18,
            "S" => 19,
            "T" => 20,
            "U" => 21,
            "V" => 22,
            "W" => 23,
            "X" => 24,
            "Y" => 25,
            "Z" => 26,
        ];

        $len = strlen($s);
        $total = 0;
        $base = 1;
        for ($i=$len-1; $i>=0; $i--) {
            $word = $s[$i];
            $total += $base * $mapping[$word];
            $base *= 26;
        }
        return $total;
    }
}