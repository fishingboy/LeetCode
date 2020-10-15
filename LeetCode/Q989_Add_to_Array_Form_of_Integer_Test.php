<?php
namespace LeetCode\Q989;
use PHPUnit\Framework\TestCase;

class Q989_Add_to_Array_Form_of_Integer_Test extends TestCase
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
        $A = [1,2,0,0]; $K = 34;
        $response = $this->solution->addToArrayForm($A, $K);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([1,2,3,4], $response);
    }

    public function testSample2()
    {
        $A = [2,7,4]; $K = 181;
        $response = $this->solution->addToArrayForm($A, $K);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([4,5,5], $response);
    }

    public function testSample3()
    {
        $A = [2,1,5]; $K = 806;
        $response = $this->solution->addToArrayForm($A, $K);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([1,0,2,1], $response);
    }

    public function testSample4()
    {
        $A = [9,9,9,9,9,9,9,9,9,9]; $K = 1;
        $response = $this->solution->addToArrayForm($A, $K);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([1,0,0,0,0,0,0,0,0,0,0], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $A
     * @param Integer $K
     * @return Integer[]
     */
    function addToArrayForm($A, $K)
    {
        $count = count($A);
        $i = $remaining = 0;
        $answers = [];
        while ($K || $i < $count) {
            $i++;
            $bit = $K % 10;
            $remaining = $A[$count - $i] + $bit + $remaining;
            $answers[] = $remaining % 10;
            $remaining = intval($remaining / 10);
            $K = intval($K / 10);
        }

        if ($remaining) {
            $answers[] = $remaining;
        }

        return array_reverse($answers);
    }
}