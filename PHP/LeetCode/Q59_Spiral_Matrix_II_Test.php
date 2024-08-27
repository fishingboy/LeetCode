<?php
namespace LeetCode\Q59;
use PHPUnit\Framework\TestCase;

class Q59_Spiral_Matrix_II_Test extends TestCase
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
        $n = 3;
        $response = $this->solution->generateMatrix($n);
        $this->assertEquals([[1,2,3],[8,9,4],[7,6,5]], $response);
    }
    public function testSample2()
    {
        $n = 1;
        $response = $this->solution->generateMatrix($n);
        $this->assertEquals([[1]], $response);
    }
}

class Solution {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n) {
        $ways = [[0,1], [1,0], [0,-1], [-1, 0]];
        $current_way = 0;
        $output = [];
        $x = $y = 0;

        for ($i=0; $i<$n; $i++) {
            $output[] = [];
            for ($j=0; $j<$n; $j++) {
                $output[$i][] = null;
            }
        }

        $number = 1;
        while (1) {
            $output[$x][$y] = $number;
            $number++;

            // 同方向
            $next_x = $x + $ways[$current_way][0];
            $next_y = $y + $ways[$current_way][1];
            if (0 <= $next_x && $next_x <= $n-1
                && 0 <= $next_y && $next_y <= $n-1
                && $output[$next_x][$next_y] === null) {
                $x = $next_x;
                $y = $next_y;
                continue;
            }

            // 轉方向
            $current_way = ($current_way + 1) % 4;
            $next_x = $x + $ways[$current_way][0];
            $next_y = $y + $ways[$current_way][1];
            if (0 <= $next_x && $next_x <= $n-1
                && 0 <= $next_y && $next_y <= $n-1
                && $output[$next_x][$next_y] === null) {
                $x = $next_x;
                $y = $next_y;
                continue;
            }

            break;
        }
        return $output;
    }
}