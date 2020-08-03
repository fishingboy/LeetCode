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

        for ($i=0; $i<$k-1;$i++) {
            array_push($stack, $s[$i]);
        }

        $diff_stack = [];
        while ($i < $len) {
            $prev_s = "";
            for ($i=0; $i<$k-1; $i++) {
                $curr_s = $s[$i];
                $diff_stack[] = array_pop($stack) ;
            }

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