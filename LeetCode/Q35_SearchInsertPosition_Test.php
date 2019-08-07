<?php
namespace LeetCode\Q35;
use PHPUnit\Framework\TestCase;

class Q35_SearchInsertPosition_Test extends TestCase
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
        $nums = [1,3,5,6];
        $target = 5;
        $response = $this->solution->searchInsert($nums, $target);
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        $nums = [1,3,5,6];
        $target = 2;
        $response = $this->solution->searchInsert($nums, $target);
        $this->assertEquals(1, $response);
    }

    public function testSample3()
    {
        $nums = [1,3,5,6];
        $target = 7;
        $response = $this->solution->searchInsert($nums, $target);
        $this->assertEquals(4, $response);
    }

    public function testSample4()
    {
        $nums = [1,3,5,6];
        $target = 0;
        $response = $this->solution->searchInsert($nums, $target);
        $this->assertEquals(0, $response);
    }

    public function testSample5()
    {
        $nums = [0,1,1,1,1,1,1,1,1,1,1];
        $target = 1;
        $response = $this->solution->searchInsert($nums, $target);
        $this->assertEquals(1, $response);
    }

    public function testSample6()
    {
        $nums = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
        $target = 11.5;
        $response = $this->solution->searchInsert($nums, $target);
        $this->assertEquals(12, $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function searchInsert($nums, $target)
    {
        $low = 0; $high = count($nums);

        if ($target <= $nums[0]) {
            return 0;
        } else if ($target > $nums[$high - 1]) {
            return $high;
        }

        while ($low <= $high) {
            $middle = intval(($low + $high) / 2);

            if ($nums[$middle-1] < $target && $target <= $nums[$middle]) {
                return $middle;
            } else if ($target > $nums[$middle]) {
                $low = $middle;
            } else {
                $high = $middle;
            }
        }
    }
}