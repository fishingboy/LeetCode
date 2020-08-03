<?php
namespace LeetCode\Q1209;
use PHPUnit\Framework\TestCase;

class Q1209_RemoveAllAdjacentDuplicatesInStringII_Test extends TestCase
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
        $s = "abcd"; $k = 2;
        $response = $this->solution->removeDuplicates($s, $k);
        var_dump($response);
        $this->assertEquals("abcd", $response);
    }

    public function testSample2()
    {
        $s = "deeedbbcccbdaa"; $k = 3;
        $response = $this->solution->removeDuplicates($s, $k);
        var_dump($response);
        $this->assertEquals("aa", $response);
    }

    public function testSample3()
    {
        $s = "pbbcggttciiippooaais"; $k = 2;
        $response = $this->solution->removeDuplicates($s, $k);
        var_dump($response);
        $this->assertEquals("ps", $response);
    }

    public function test_self1()
    {
        $s = "rppaaccccaappr"; $k = 4;
        $response = $this->solution->removeDuplicates($s, $k);
        var_dump($response);
        $this->assertEquals("rr", $response);
    }
}


class Solution
{
    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function removeDuplicates($s, $k)
    {
        $stack = [];
        $len = strlen($s);

        for ($i=0; $i<$k-1; $i++) {
            array_push($stack, $s[$i]);
        }

        while ($i < $len) {
            $diff_stack = [$s[$i]];
            for ($j=0; $j<$k-1; $j++) {
                array_push($diff_stack, array_pop($stack)) ;
            }

            if (count($diff_stack) == $k) {
                for ($j=0; $j<$k-1; $j++) {
                    if ($diff_stack[$j] != $diff_stack[$j+1]) {
                        while (count($diff_stack)) {
                            array_push($stack, array_pop($diff_stack));
                        }
                        break;
                    }
                }
            } else {
                while (count($diff_stack)) {
                    array_push($stack, array_pop($diff_stack));
                }
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