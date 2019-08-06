<?php
namespace LeetCode\Q20;
use PHPUnit\Framework\TestCase;

class Q20_ValidParentheses_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testExample3()
    {
        $s = "(]";
        $response = $this->solution->isValid($s);
        $this->assertFalse($response);
    }

    public function testExample4()
    {
        $s = "([)]";
        $response = $this->solution->isValid($s);
        $this->assertFalse($response);
    }

    public function testExample5()
    {
        $s = "{[]}";
        $response = $this->solution->isValid($s);
        $this->assertTrue($response);
    }

    public function testExample6()
    {
        $s = "{[{";
        $response = $this->solution->isValid($s);
        $this->assertFalse($response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s)
    {
        $mapping = [
            ")" => "(",
            "]" => "[",
            "}" => "{",
        ];

        $stack = [];
        $n = strlen($s);
        for ($i=0; $i<$n; $i++) {
            $w = $s[$i];
            switch ($w) {
                case "(":
                case "[":
                case "{":
                    array_push($stack, $w);
                    break;
                case ")":
                case "]":
                case "}":
                    $head = array_pop($stack);
                    if ($head != $mapping[$w]) {
                        return false;
                    }
                    break;

            }
        }
        return  count($stack) == 0;
    }
}