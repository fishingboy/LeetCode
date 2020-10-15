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
        $zero = ord("A") - 1;
        $len = strlen($s);
        $total = 0;
        $base = 1;
        for ($i=$len-1; $i>=0; $i--) {
            $word = $s[$i];
            $total += $base * (ord($word) - $zero);
            $base *= 26;
        }

        return $total;
    }
}