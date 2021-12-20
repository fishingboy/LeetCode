<?php
namespace LeetCode\Q1614;
use PHPUnit\Framework\TestCase;

class Q1614_MaximumNestingDepth_of_the_Parentheses_Test extends TestCase
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
        $s = "(1+(2*3)+((8)/4))+1";
        $response = $this->solution->maxDepth($s);
        $this->assertEquals(3, $response);
    }

    public function test_sample2()
    {
        $s = "(1)+((2))+(((3)))";
        $response = $this->solution->maxDepth($s);
        $this->assertEquals(3, $response);
    }

    public function test_sample3()
    {
        $s = "1+(2*3)/(2-1)";
        $response = $this->solution->maxDepth($s);
        $this->assertEquals(1, $response);
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
                if (count($stack) > $max) {
                    $max = count($stack);
                }
            } else if ($word == ")") {
                array_pop($stack);
            }
        }
        return $max;
    }
}