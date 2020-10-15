<?php
namespace LeetCode\Q1614;
use PHPUnit\Framework\TestCase;

class Q1614_MaximumNestingDepth_of_the_Parentheses_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function test_sample1()
    {
        $s = "(1+(2*3)+((8)/4))+1";
        $response = $this->solution->maxDepth($s);
        $this->assertEquals(3, $response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function maxDepth($s)
    {
        $stack = [];
        $max = 0;
        for ($i=0, $len=strlen($s); $i <$len; $i++) {
            $word = $s[$i];
            if ($word == "(") {
                array_push($stack, $word);
                if (count($stack) - 1 > $max) {
                    $max = count($stack) - 1;
                }
            } else if ($word == ")") {
                array_pop($stack);
            }
        }
        return $max;
    }
}