<?php
namespace LeetCode\Q66;
use PHPUnit\Framework\TestCase;

class Q66_PlusOne_Test extends TestCase
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
        $digits = [1,2,3];
        $response = $this->solution->plusOne($digits);
        $this->assertArraySubset([1,2,4], $response);
    }

    public function testSample2()
    {
        $digits = [1,2,9];
        $response = $this->solution->plusOne($digits);
        $this->assertArraySubset([1,3,0], $response);
    }

    public function testSample3()
    {
        $digits = [9, 9, 9];
        $response = $this->solution->plusOne($digits);
        $this->assertArraySubset([1, 0, 0, 0], $response);
    }

    public function test_wa1()
    {
        $digits = [9];
        $response = $this->solution->plusOne($digits);
        $this->assertArraySubset([1, 0], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits)
    {
        $count = count($digits);

        // 加 1
        $digits[$count - 1]++;

        // 進位
        $new_bit = false;
        for ($i = $count-1; $i >=0; $i--) {
            if ($digits[$i] < 10) {
                break;
            }
            $digits[$i] -= 10;

            if (isset($digits[$i - 1])) {
                $digits[$i - 1]++;
            } else {
                $new_bit = true;
            }
        }

        // 加新位數
        if ($new_bit) {
            return array_merge([1], $digits);
        } else {
            return $digits;
        }
    }
}