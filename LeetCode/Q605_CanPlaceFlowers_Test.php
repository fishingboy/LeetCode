<?php
namespace LeetCode\Q605;
use PHPUnit\Framework\TestCase;

class Q605_CanPlaceFlowers_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $flowerbed = [1,0,0,0,1]; $n = 1;
        $response = $this->solution->canPlaceFlowers($flowerbed, $n);
        var_dump($response);
        $this->assertEquals(true, $response);
    }

    public function testSample2()
    {
        $flowerbed = [1,0,0,0,1]; $n = 2;
        $response = $this->solution->canPlaceFlowers($flowerbed, $n);
        var_dump($response);
        $this->assertEquals(false, $response);
    }

    public function test_wa1()
    {
        $flowerbed = [1,0,1,0,1]; $n = 0;
        $response = $this->solution->canPlaceFlowers($flowerbed, $n);
        var_dump($response);
        $this->assertEquals(true, $response);
    }

    public function test_wa2()
    {
        $flowerbed = [0,0,0,0,0,1,0,0]; $n = 0;
        $response = $this->solution->canPlaceFlowers($flowerbed, $n);
        var_dump($response);
        $this->assertEquals(true, $response);
    }
}


class Solution
{
    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n)
    {
        if ($n == 0) {
            return true;
        }

        $count = count($flowerbed);
        foreach ($flowerbed as $i => $item) {
            if ($item == 0) {
                if ($i > 0 && $flowerbed[$i - 1] != 0) {
                    continue;
                }
                if ($i < $count-1 && $flowerbed[$i + 1] != 0) {
                    continue;
                }
                $flowerbed[$i] = 1;
                $n--;
                if ($n == 0) {
                    return true;
                }
            }
        }
        return false;
    }
}