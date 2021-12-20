<?php
namespace LeetCode\Q1528;
use PHPUnit\Framework\TestCase;

class Q1528_ShuffleString_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function test_sample1()
    {
        $s = "codeleet";
        $indices = [4,5,6,7,0,2,1,3];
        $response = $this->solution->restoreString($s, $indices);
        $this->assertEquals("leetcode", $response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @param Integer[] $indices
     * @return String
     */
    function restoreString($s, $indices)
    {
        $answer = "";
        $i = 0;
        foreach ($indices as $index) {
            $answer[$index] = $s[$i];
            $i++;
        }

        return $answer;
    }
}