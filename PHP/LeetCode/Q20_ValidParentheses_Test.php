<?php
namespace LeetCode\Q20;
use PHPUnit\Framework\TestCase;

class Q20_ValidParentheses_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->isValid($test['args']['s']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
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