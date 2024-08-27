<?php
namespace LeetCode\Q54;
use PHPUnit\Framework\TestCase;

class Q54_Spiral_Matrix_Test extends TestCase
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
        $matrix = [[1,2,3],[4,5,6],[7,8,9]];
        $response = $this->solution->spiralOrder($matrix);
        $this->assertEquals([1,2,3,6,9,8,7,4,5], $response);
    }
}

class Solution {

    /**
     * @param Integer[][] $matrix
     * @return Integer[]
     */
    function spiralOrder($matrix) {
        $ways = [[0,1], [1,0], [0,-1], [-1,0]];
        $current_way = 0;
        $x = $y = 0;
        $output = [];
        while (1) {
            $output[] = $matrix[$x][$y];
            $matrix[$x][$y] = null;

            // 同方向繼續走
            $next = $matrix[$x + $ways[$current_way][0]][$y + $ways[$current_way][1]] ?? null;
            if ($next !== null) {
                $x = $x + $ways[$current_way][0];
                $y = $y + $ways[$current_way][1];
                continue;
            }

            // 轉向
            $current_way = ($current_way + 1) % 4;
            $next = $matrix[$x + $ways[$current_way][0]][$y + $ways[$current_way][1]] ?? null;
            if ($next !== null) {
                $x = $x + $ways[$current_way][0];
                $y = $y + $ways[$current_way][1];
                continue;
            }

            break;
        }
        return $output;
    }
}