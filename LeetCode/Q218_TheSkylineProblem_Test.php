<?php
namespace LeetCode\Q218;
use PHPUnit\Framework\TestCase;

class Q218_TheSkylineProblem_Test extends TestCase
{
    /**
     * @property Solution $solution
     */
    private $solution;
    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $buildings = [[2,9,10],[3,7,15],[5,12,12],[15,20,10],[19,24,8]];
        $response = $this->solution->getSkyline($buildings);
        $this->assertEquals([[2,10],[3,15],[7,12],[12,0],[15,10],[20,8],[24,0]], $response);
    }

    public function testSample2()
    {
        $buildings = [[0,2,3],[2,5,3]];
        $response = $this->solution->getSkyline($buildings);
        $this->assertEquals([[0,3],[5,0]], $response);
    }

    public function testSample3()
    {
        $buildings = [[1,2,1],[1,2,2],[1,2,3]];
        $response = $this->solution->getSkyline($buildings);
        $this->assertEquals([[1,3],[2,0]], $response);
    }

    public function testSample4()
    {
        $buildings = [[0,2,3],[2,4,3],[4,6,3]];
        $response = $this->solution->getSkyline($buildings);
        $this->assertEquals([[0,3],[6,0]], $response);
    }

    public function testSample5()
    {
        $buildings = [[1,20,1],[1,21,2],[1,22,3]];
        $response = $this->solution->getSkyline($buildings);
        $this->assertEquals([[1,3],[22,0]], $response);
    }

    public function testSample6()
    {
        $buildings = [[2,14,4],[4,8,8],[6,16,4]];
        $response = $this->solution->getSkyline($buildings);
        $this->assertEquals([[2,4],[4,8],[8,4],[16,0]], $response);
        // 奇怪，這個規則不對吧！？
        // 每個關鍵點都是天際線中某個水平線段的左端點
        // 原來是我理解錯誤
        // 那要全部重寫啦！
    }
    public function testSample7()
    {
        $buildings = [[1,10,10],[3,7,15]];
        $response = $this->solution->getSkyline($buildings);
        $this->assertEquals([[1,10],[3,15],[7,10],[10,0]], $response);
    }
}

class Solution {
    /**
     * @param Integer[][] $buildings
     * @return Integer[][]
     */
    function getSkyline($buildings) {
        // 重整資料結構
        $points = [];
        foreach ($buildings as $i => $building) {
            $buildings[$i]['left'] = $building[0];
            $buildings[$i]['right'] = $building[1];
            $buildings[$i]['height'] = $building[2];

            $buildings[$i]['points']['left-bottom'] = [$building[0], 0];
            $buildings[$i]['points']['left-top'] = [$building[0], $building[2]];
            $buildings[$i]['points']['right-top'] = [$building[1], $building[2]];
            $buildings[$i]['points']['right-bottom'] = [$building[1], 0];

            unset($buildings[$i][0]);
            unset($buildings[$i][1]);
            unset($buildings[$i][2]);
        }

//        print_r($buildings);

        // 判断覆蓋
        // $points = [];

        // building
        foreach ($buildings as $i => $building) {
            // points
            foreach ($buildings as $j => $building_points) {
                if ($i == $j) {
                    continue;
                }
                foreach ($building_points['points'] as $position => $point) {
                    if ($building['left'] < $point[0] && $point[0] < $building['right']) {
                        // 如果有被蓋住的話, 直接把 point 移到頂點
                        if ($point[1] < $building['height']) {
//                            echo "1. move ({$point[0]}, {$point[1]}) -> ({$point[0]}, {$building['height']}) \n";
                            $buildings[$j]['points'][$position] = [$point[0], $building['height']];
                        }
                    } else if (($building['left'] == $building_points['right'] && $building['left'] == $point[0]) ||
                               ($building_points['left'] == $building['right'] && $building['right'] == $point[0])) {
                        // 左右共線的話，直接把 point 移到頂點
                        if ($point[1] < $building['height']) {
//                            echo "2. move ({$point[0]}, {$point[1]}) -> ({$point[0]}, {$building['height']}) \n";
                            $buildings[$j]['points'][$position] = [$point[0], $building['height']];
                        }
                    } else if (($building['left'] == $building_points['left']  && $building['left'] == $point[0]) ||
                               ($building_points['right'] == $building['right']  && $building['right'] == $point[0])) {
                        // 共左線或共右的話，後面的線去移
                        if ($point[1] < $building['height'] && $building['height'] > $building_points['height']) {
//                            echo "3. move ({$point[0]}, {$point[1]}) -> ({$point[0]}, {$building['height']}) \n";
                            $buildings[$j]['points'][$position] = [$point[0], $building['height']];
                        }
                    }
                }
            }
        }

//        print_r($buildings);

        // 取唯一値
        $group_points = [];
        foreach ($buildings as $j => $building_points) {
            foreach ($building_points['points'] as $position => $point) {
                $group_points[$point[0]][$point[1]] = $point;
            }
        }
        foreach ($group_points as $i => $points) {
            $group_points[$i] = array_values($points);
        }
        usort($group_points, function($a, $b) {
            return $a[0][0] <=> $b[0][0];
        });

//        print_r($group_points);

        // 顕示出答案
        $answer = [];
        $height = 0;
        foreach ($group_points as $x => $points) {
            if (count($points) == 2) {
                $point = ($points[0][1] == $height) ? $points[1] : $points[0];
                $answer[] = $point;
                $height = $point[1];
            }
        }

        return $answer;
    }
}