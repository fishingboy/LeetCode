<?php
namespace LeetCode\Q1021;
use PHPUnit\Framework\TestCase;

class Q1021_RemoveOutermostParentheses_Test extends TestCase
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
        $S = "(()())(())";
        $response = $this->solution->removeOuterParentheses($S);
        $this->assertEquals("()()()", $response);
    }

    public function test_sample2()
    {
        $S = "(()())(())(()(()))";
        $response = $this->solution->removeOuterParentheses($S);
        $this->assertEquals("()()()()(())", $response);
    }

    public function test_sample3()
    {
        $S = "()()";
        $response = $this->solution->removeOuterParentheses($S);
        $this->assertEquals("", $response);
    }
}

class Solution
{
    /**
     * @param String $S
     * @return String
     */
    function removeOuterParentheses($S)
    {
        $stack = [];
        $length = strlen($S);

        $answer = "";
        for ($i=0; $i<$length; $i++) {
            $word = $S[$i];
            if ($word == "(") {
                array_push($stack, $word);
                if (count($stack) > 1) {
                    $answer .= $word;
                }
            } else {
                array_pop($stack);
                if (count($stack) > 0) {
                    $answer .= $word;
                }
            }
        }

        return $answer;
    }
}