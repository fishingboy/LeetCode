<?php

namespace LeetCode\Q1351;

use PHPUnit\Framework\TestCase;

class Q1351_CountNegativeNumbers_in_a_SortedMatrix_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function test_sample1()
    {
        $grid = [[4,3,2,-1],[3,2,1,-1],[1,1,-1,-2],[-1,-1,-2,-3]];
        $response = $this->solution->countNegatives($grid);
        $this->assertEquals(8, $response);
    }

    public function test_sample2()
    {
        $grid = [[3,2],[1,0]];
        $response = $this->solution->countNegatives($grid);
        $this->assertEquals(0, $response);
    }

    public function test_sample3()
    {
        $grid = [[1,-1],[-1,-1]];
        $response = $this->solution->countNegatives($grid);
        $this->assertEquals(3, $response);
    }
}

class Solution
{
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function countNegatives($grid)
    {
        $count = 0;
        $length = count($grid[0]);
        foreach ($grid as $nums) {
            foreach ($nums as $i => $num) {
                if ($num < 0) {
                    $count += ($length - $i);
                    break;
                }
            }
        }
        return $count;
    }
}