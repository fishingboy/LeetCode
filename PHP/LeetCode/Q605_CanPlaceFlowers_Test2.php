<?php
namespace LeetCode\Q605;
use PHPUnit\Framework\TestCase;

class Q605_CanPlaceFlowers_Test2 extends TestCase
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


class Solution {
    /**
     * @param Integer[] $flowerbed
     * @param Integer $n
     * @return Boolean
     */
    function canPlaceFlowers($flowerbed, $n) {
        $answer = 0;
        for ($i=0; $i<count($flowerbed); $i++) {
            if ($flowerbed[$i] == 1) {
                continue;
            }
            if ($i-1 > 0 && $flowerbed[$i-1] == 0) {
                if ($i+1 < count($flowerbed) && $flowerbed[$i+1] == 0) {
                    $answer++;
                    $i += 1;
                }
            }
            if ($answer >= $n) {
                return true;
            }
        }
        return ($answer >= $n);
    }
}