<?php
namespace LeetCode\Q54;
use PHPUnit\Framework\TestCase;

class Q54_Spiral_Matrix_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->spiralOrder($test['args']['matrix']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
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