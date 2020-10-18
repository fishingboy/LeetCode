<?php
namespace LeetCode\Q1111;
use PHPUnit\Framework\TestCase;

class Q1111_MaximumNestingDepth_of_TwoValidParenthesesStrings_Test extends TestCase
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
        $seq = "(()())";
        $response = $this->solution->maxDepthAfterSplit($seq);
        $this->assertArraySubset([0,1,1,1,1,0], $response);
    }

    public function testSample2()
    {
        $seq = "()(())()";
        $response = $this->solution->maxDepthAfterSplit($seq);
        $this->assertArraySubset([0,0,0,1,1,0,1,1], $response);
    }

    public function test_WA1()
    {
        $seq = "((()))";
        $response = $this->solution->maxDepthAfterSplit($seq);
        $this->assertArraySubset([0,0,1,0,0,1], $response);
    }
}

class Solution
{
    /**
     * @param String $seq
     * @return Integer[]
     */
    function maxDepthAfterSplit($seq)
    {
        $stack = [];
        $len = strlen($seq);
        $answer = array_pad([], $len, 0);
        for ($i=0; $i<$len; $i++) {
            if ($seq[$i] == "(") {
                array_push($stack, $i);
            } else {
                $pos = array_pop($stack);
                $answer[$pos] = $answer[$i] = count($stack);
            }
        }
        return $answer;
    }
}