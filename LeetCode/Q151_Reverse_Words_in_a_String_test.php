<?php
namespace LeetCode\Q151;
use PHPUnit\Framework\TestCase;

class Q151_Reverse_Words_in_a_String_test extends TestCase
{
    public function testSample1()
    {
        $solution = new Solution();
        $s = "the sky is blue";
        $response = $solution->reverseWords($s);
        $this->assertEquals("blue is sky the", $response);
    }

    public function testSample2()
    {
        $solution = new Solution();
        $s = "  hello world  ";
        $response = $solution->reverseWords($s);
        $this->assertEquals("world hello", $response);
    }


    public function testSample3()
    {
        $solution = new Solution();
        $s = "a good   example";
        $response = $solution->reverseWords($s);
        $this->assertEquals("example good a", $response);
    }

}

class Solution {
    /**
     * @param String $s
     * @return String
     */
    function reverseWords($s) {
        $stack = [];
        $word = "";
        for ($i=0; $i<strlen($s); $i++) {
            $char = $s[$i];
            if ($char === ' ') {
                if ($word !== "") {
                    $stack[] = $word;
                    $word = "";
                }
            } else {
                $word .= $char;
            }
        }

        if ($word !== "") {
            $stack[] = $word;
        }

        $answer = "";
        while (count($stack)) {
            $word = array_pop($stack);
            if (strlen($answer)) {
                $answer .= " ";
            }
            $answer .= $word;
        }
        return $answer;
    }
}