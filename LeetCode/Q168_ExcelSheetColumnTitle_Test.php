<?php
namespace LeetCode\Q168;
use PHPUnit\Framework\TestCase;

class Q168_ExcelSheetColumnTitle_Test extends TestCase
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
        $response = $this->solution->convertToTitle(1);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals("A",$response);
    }

    public function testSample2()
    {
        $response = $this->solution->convertToTitle(28);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals("AB",$response);
    }

    public function testSample3()
    {
        $response = $this->solution->convertToTitle(701);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals("ZY",$response);
    }

}

class Solution
{
    /**
     * @param Integer $n
     * @return String
     */
    function convertToTitle($n)
    {
        $s = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $answer = "";
        while ($n > 0) {
            $n--;
            $answer = $s[$n % 26] . $answer;
            $n = intval($n / 26);
        }
        return $answer;
    }
}