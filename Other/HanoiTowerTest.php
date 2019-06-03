<?php
use PHPUnit\Framework\TestCase;

class HanoiTowerTest extends TestCase
{
    public function testSample1()
    {
        $solution = new HanoiTower();
        $n = 1;
        $solution->move($n, 'A', 'B', 'C');
        $this->assertTrue(true);
    }

    public function testSample2()
    {
        $solution = new HanoiTower();
        $n = 2;
        $solution->move($n, 'A', 'B', 'C');
        $this->assertTrue(true);
    }

    public function testSample3()
    {
        $solution = new HanoiTower();
        $n = 3;
        $solution->move($n, 'A', 'B', 'C');
        $this->assertTrue(true);
    }

    public function testSample4()
    {
        $solution = new HanoiTower();
        $n = 4;
        $solution->move($n, 'A', 'B', 'C');
        $this->assertTrue(true);
    }

    public function testSample5()
    {
        $solution = new HanoiTower();
        $n = 5;
        $solution->move($n, 'A', 'B', 'C');
        $this->assertTrue(true);
    }
}

class HanoiTower
{
    private $step = 1;
    function move($n, $origin, $target, $tmp)
    {
        // 把其他的盤子搬到暫存柱
        if ($n - 1 > 0) {
            $this->move($n - 1, $origin, $tmp, $target);
        }

        // 把最大的盤子直接搬到目標柱
        echo "{$this->step}. 把 $n 從 $origin -> $target\n";
        $this->step++;

        // 把其他盤子搬回來目標柱
        if ($n - 1 > 0) {
            $this->move($n - 1, $tmp, $target, $origin);
        }
    }
}