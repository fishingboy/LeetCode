<?php
use PHPUnit\Framework\TestCase;

class HanoiTowerTest extends TestCase
{
    public function testSample1()
    {
        $solution = new HanoiTower();
        $n = 1;
        $solution->move($n, 'A', 'B', 'C');
        $result = $solution->getResult();
        $this->assertEquals("1B", $result);
    }

    public function testSample2()
    {
        $solution = new HanoiTower();
        $n = 2;
        $solution->move($n, 'A', 'B', 'C');
        $this->assertTrue(true);
        $result = $solution->getResult();
        $this->assertEquals("1C,2B,1B", $result);
    }

    public function testSample3()
    {
        $solution = new HanoiTower();
        $n = 3;
        $solution->move($n, 'A', 'B', 'C');

        $result = $solution->getResult();
        $this->assertEquals("1B,2C,1C,3B,1A,2B,1B", $result);
    }

    public function testSample4()
    {
        $solution = new HanoiTower();
        $n = 4;
        $solution->move($n, 'A', 'B', 'C');

        $result = $solution->getResult();
        $this->assertEquals("1C,2B,1B,3C,1A,2C,1C,4B,1B,2A,1A,3B,1C,2B,1B", $result);
    }

    public function testSample5()
    {
        $solution = new HanoiTower();
        $n = 5;
        $solution->move($n, 'A', 'B', 'C');
        $this->assertTrue(true);
    }

    public function testSample10()
    {
        $solution = new HanoiTower();
        $n = 10;
        $solution->move($n, 'A', 'B', 'C');
        $this->assertTrue(true);
    }
}

class HanoiTower
{
    private $step_no = 1;
    private $results = [];

    /**
     * @param int $n          總共幾個盤子
     * @param string $origin  原本的柱子
     * @param string $target  目標柱子
     * @param string $tmp     緩衝用的柱子
     */
    public function move($n, $origin, $target, $tmp)
    {
        // 把其他的盤子搬到暫存柱
        if ($n - 1 > 0) {
            $this->move($n - 1, $origin, $tmp, $target);
        }

        // 把最大的盤子直接搬到目標柱
        echo "{$this->step_no}. 把 $n 從 $origin -> $target\n";
        $this->results[] = "{$n}{$target}";
        $this->step_no++;

        // 把其他盤子搬回來目標柱
        if ($n - 1 > 0) {
            $this->move($n - 1, $tmp, $target, $origin);
        }
    }

    public function getResult()
    {
        return implode(",", $this->results);
    }
}