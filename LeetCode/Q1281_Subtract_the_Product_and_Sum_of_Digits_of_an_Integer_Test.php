<?php
namespace LeetCode\Q1281;
use PHPUnit\Framework\TestCase;

class Q1281_Subtract_the_Product_and_Sum_of_Digits_of_an_Integer_Test extends TestCase
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
        $n = 234;
        $response = $this->solution->subtractProductAndSum($n);
        $this->assertEquals(15, $response);
    }

    public function testSample2()
    {
        $n = 4421;
        $response = $this->solution->subtractProductAndSum($n);
        $this->assertEquals(21, $response);
    }
}

class Solution
{
    /**
     * @param Integer $n
     * @return Integer
     */
    function subtractProductAndSum($n)
    {
        $sum1 = 1;
        $sum2 = 0;
        while ($n) {
            $d = $n % 10;
            $n = intval($n / 10);
            $sum1 *= $d;
            $sum2 += $d;
        }
        return $sum1 - $sum2;
    }
}