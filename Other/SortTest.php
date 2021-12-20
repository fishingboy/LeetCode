<?php
use PHPUnit\Framework\TestCase;

class SortTest extends TestCase
{
    public function testSample1()
    {
        $nums = [5,9,44,3];
        $response = select_sort($nums);
        $this->assertEquals([3,5,9,44], $response);
    }

    public function testSample2()
    {
        $nums = [5,9,44,3];
        $response = bubble_sort($nums);
        $this->assertEquals([3,5,9,44], $response);
    }
}

function select_sort($nums)
{
    $n = count($nums);
    for ($i=0; $i<$n-1;$i++) {
        for ($j=$i+1; $j<$n;$j++) {
            if ($nums[$i] > $nums[$j]) {
                swap($nums[$i], $nums[$j]);
            }
        }
    }
    return $nums;
}

function bubble_sort($nums)
{
    $n = count($nums);
    for ($i=0; $i<$n-1;$i++) {
        for ($j=0; $j<$n-$i-1;$j++) {
            if ($nums[$j] > $nums[$j+1]) {
                swap($nums[$j], $nums[$j+1]);
            }
        }
    }
    return $nums;
}

function swap(&$a, &$b)
{
    $tmp = $a;
    $a = $b;
    $b = $tmp;
}