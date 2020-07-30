<?php
namespace LeetCode\Q1047;
use PHPUnit\Framework\TestCase;

class Q1047_RemoveAllAdjacentDuplicatesInString_Test extends TestCase
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
        $s = "abbaca";
        $response = $this->solution->removeDuplicates($s);
        var_dump($response);
        $this->assertEquals("ca", $response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @return String
     */
    function removeDuplicates($s)
    {
        $stack = [];
        $len = strlen($s);

        array_push($stack, $s[0]);

        $i = 1;
        while ($i < $len) {
            $prev_s = array_pop($stack) ?? null;
            $curr_s = $s[$i];
            if ($curr_s != $prev_s) {
                array_push($stack, $prev_s);
                array_push($stack, $curr_s);
            }
            $i++;
        }

        $answer = "";
        foreach ($stack as $item) {
            $answer .= $item;
        }
        return $answer;
    }
}