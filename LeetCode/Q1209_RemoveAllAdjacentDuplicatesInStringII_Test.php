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
        $s = "deeedbbcccbdaa"; $k = 3;
        $response = $this->solution->removeDuplicates($s, $k);
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
    function removeDuplicates($s, $k)
    {
        $stack = [];
        $len = strlen($s);

        for ($i=0; $i<$k-1; $i++) {
            array_push($stack, $s[$i]);
        }

        $diff_stack = [];
        while ($i < $len) {
            for ($j=0; $j<$k; $j++) {
                $diff_stack[] = array_pop($stack) ;
                if ($j > 0 && $diff_stack[$j] != $diff_stack[$j - 1]) {
                    while (count($diff_stack)) {
                        array_push($stack, array_pop($diff_stack));
                    }
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