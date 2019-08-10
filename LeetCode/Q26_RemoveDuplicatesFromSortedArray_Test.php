<?php
namespace LeetCode\Q26;
use PHPUnit\Framework\TestCase;

class Q26_RemoveDuplicatesFromSortedArray_Test extends TestCase
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
        $array = [1,1,2];
        $response = $this->solution->removeDuplicates($array);
        $this->assertEquals(2, $response);
        $this->assertArraySubset([1,2], $array);
    }

    public function testSample2()
    {
        $array = [0,0,1,1,1,2,2,3,3,4];
        $response = $this->solution->removeDuplicates($array);
        $this->assertEquals(5, $response);
        $this->assertArraySubset([0,1,2,3,4], $array);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums)
    {
        $pre = null;
        $len = count($nums);
        for ($i=$len-1; $i >= 0; $i--) {
            if ($nums[$i] === $pre) {
                array_splice($nums, $i, 1);
            }
            $pre = $nums[$i];
        }
        return count($nums);
    }
}