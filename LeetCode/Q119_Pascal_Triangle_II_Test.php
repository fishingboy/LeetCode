<?php
namespace LeetCode\Q119;
use PHPUnit\Framework\TestCase;

class Q119_Pascal_Triangle_II_Test extends TestCase
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
        $response = $this->solution->getRow(3);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([1,3,3,1],$response);
    }

}

class Solution
{
    /**
     * @param Integer $rowIndex
     * @return Integer[]
     */
    function getRow($rowIndex)
    {
        $triangle = [[1]];
        for ($i=1; $i<=$rowIndex; $i++) {
            for ($j=0; $j<=$i; $j++) {
                $left_num = $triangle[$i-1][$j-1] ?? 0;
                $right_num = $triangle[$i-1][$j] ?? 0;
                $triangle[$i][$j] = $left_num + $right_num;
            }
        }
        return $triangle[$rowIndex];
    }
}