<?php
namespace LeetCode\Q118;
use PHPUnit\Framework\TestCase;

class Q118_Pascal_Triangle_Test extends TestCase
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
        $response = $this->solution->generate(5);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([
            [1],
            [1,1],
            [1,2,1],
        ],$response);
    }

    public function test_WA1()
    {
        $response = $this->solution->generate(0);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([],$response);
    }
}

class Solution
{
    /**
     * @param Integer $numRows
     * @return Integer[][]
     */
    function generate($numRows)
    {
        if ($numRows == 0) {
            return [];
        }

        $answer = [[1]];
        for ($i=1; $i<$numRows; $i++) {
            for ($j=0; $j<=$i; $j++) {
                $left_num = $answer[$i-1][$j-1] ?? 0;
                $right_num = $answer[$i-1][$j] ?? 0;
                $answer[$i][$j] = $left_num + $right_num;
            }
        }
        return $answer;
    }
}