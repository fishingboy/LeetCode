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
}

class Solution {
    /**
     * @param Integer[][] $buildings
     * @return Integer[][]
     */
    function getSkyline($buildings) {
        $points = [];
        $max_x = 0;
        foreach ($buildings as $i => $building) {
            if ($building[1] > $max_x) {
                $max_x = $building[1];
            }

            // 左、右、高
            $buildings[$i]['left']   = $building[0];
            $buildings[$i]['right']  = $building[1];
            $buildings[$i]['height'] = $building[2];
            unset($buildings[$i][0]);
            unset($buildings[$i][1]);
            unset($buildings[$i][2]);

            // 左下、左上、右上、右下
            $buildings[$i]['points']['left-bottom']  = [$building[0], 0];
            $buildings[$i]['points']['left-top']     = [$building[0], $building[2]];
            $buildings[$i]['points']['right-top']    = [$building[1], $building[2]];
            $buildings[$i]['points']['right-bottom'] = [$building[1], 0];
        }
        // $points[] = [$building[1], 0];
        // print_r($buildings);

        // 移除所有被蓋住的點
        foreach ($buildings as $i => $building) {
            foreach ($buildings as $j => $building_points) {
                if ($i == $j) {
                    continue;
                }
                $remove_count = 0;
                foreach ($building_points['points'] as $k => $point) {
                    // 覆蓋
                    if ($point[0] >= $building['left'] &&
                        $point[0] <= $building['right']) {
//                        echo "cover: ({$point[0]}, {$point[1]}), {$building['left']}, {$building['right']}, {$building['height']} \n";
                        if ($building['height'] == $point[1]) {
                            // 等高的話就合併
                            $buildings[$j]['points'][$k] = null;
                            $buildings[$j]['left'] = $buildings[$i]['left'];
                        } else if ($building['height'] > $point[1]) {
                            $buildings[$j]['points'][$k] = null;
//                            echo "remove: ({$point[0]}, {$point[1]}), {$building['left']}, {$building['right']}, {$building['height']} \n";
                            // unset($points[$i]);
                            if ($k == "left-top" &&
                                $point[1] > 0 &&
                                $point[1] < $building['height'] &&
                                $building_points['right'] > $building['right']) {
                                // $points[] = [$building[1], $point[1]];
                                echo "move point: ({$building['right']}, {$point[1]}) \n";
                                // $points[$i] = [$building['right'], $point[1]];
                                $buildings[$j]['points'][$k] = [$building['right'], $point[1]];
                            }
                        }
                        // $points[] = [$point[0], $building[2]];
                    }
                }
            }
        }

        print_r($buildings);

        // 移除全被蓋住的 building
        foreach ($buildings as $i => $building) {
            if ($building['points']['left-top'] === null &&
                $building['points']['left-bottom'] === null &&
                $building['points']['right-top'] === null &&
                $building['points']['right-bottom'] === null) {
                unset($buildings[$i]);
            }
        }
        $buildings = array_values($buildings);

        // 重整答案
        $answer = [];
        foreach ($buildings as $i => $building) {
            // 加入左上角
            if ($building['points']['left-top']) {
                $answer[] = $building['points']['left-top'];
            }

            // 右邊沒被蓋住的話，顯示右下角
            if (!isset($buildings[$i+1]) || $buildings[$i+1]['left'] > $building['right']) {
                $answer[] = [$building['right'], 0];
            }
        }

        return $answer;
    }
}