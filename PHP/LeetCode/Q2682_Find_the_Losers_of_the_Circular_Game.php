<?php
namespace LeetCode\Q2682;
use PHPUnit\Framework\TestCase;

class Q2682_Find_the_Losers_of_the_Circular_Game extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $num = 5;
        $response = $this->solution->findComplement($num);
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        $num = 1;
        $response = $this->solution->findComplement($num);
        $this->assertEquals(0, $response);
    }
}

class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[]
     */
    function circularGameLosers($n, $k) {
        $friends = [];
        for ($i=0; $i<$n; $i++) {
            $friends[] = $i + 1;
        }

        // 傳球
        $i = $index = 0;
        while (true) {
            if ($friends[$index] == 0) {
                break;
            }
            $friends[$index] = 0;
            $i++;
            $index = ($index + ($k * $i)) % $n;
        }

        // 找出失敗者
        $output = [];
        foreach ($friends as $friend) {
            if ($friend != 0) {
                $output[] = $friend;
            }
        }
        return $output;
    }
}