<?php
namespace LeetCode\Q733;
use PHPUnit\Framework\TestCase;

class Q733_Flood_Fill_Test extends TestCase
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
        $image = [
            [1,1,1],
            [1,1,0],
            [1,0,1]
        ];
        $sr = 1;
        $sc = 1;
        $color = 2;
        $response = $this->solution->floodFill($image, $sr, $sc, $color);
        $this->assertEquals([
            [2,2,2],
            [2,2,0],
            [2,0,1],
        ], $response);
    }

    public function testSample2()
    {
        $image = [
            [0,0,0],
            [0,0,0],
            [0,0,0]
        ];
        $sr = 1;
        $sc = 1;
        $color = 0;
        $response = $this->solution->floodFill($image, $sr, $sc, $color);
        $this->assertEquals([
            [0,0,0],
            [0,0,0],
            [0,0,0]
        ], $response);
    }

    public function testSample3()
    {
        $image = [
            [1]
        ];
        $sr = 0;
        $sc = 0;
        $color = 2;
        $response = $this->solution->floodFill($image, $sr, $sc, $color);
        $this->assertEquals([
            [2]
        ], $response);
    }
}

class Solution {
    private $ways = [
        [1, 0],
        [-1, 0],
        [0, 1],
        [0, -1],
    ];

    /**
     * @param Integer[][] $image
     * @param Integer $sr
     * @param Integer $sc
     * @param Integer $color
     * @return Integer[][]
     */
    function floodFill($image, $sr, $sc, $color)
    {
        // same color
        if ($color === $image[$sr][$sc]) {
            return $image;
        }
        $this->draw($image, $sr, $sc, $color, $image[$sr][$sc]);
        return $image;
    }

    function draw(&$image, $sr, $sc, $color, $before_color)
    {
        $image[$sr][$sc] = $color;

        foreach ($this->ways as $diff) {
            $point_color = $image[$sr + $diff[0]][$sc + $diff[1]] ?? null;
            if ($point_color === $before_color) {
                $this->draw($image, $sr + $diff[0], $sc + $diff[1], $color, $before_color);
            }
        }
    }
}