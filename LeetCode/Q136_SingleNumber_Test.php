<?php
namespace LeetCode\Q136;
use PHPUnit\Framework\TestCase;

class Q136_SingleNumber_Test extends TestCase
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
        $nums = [2,2,1];
        $response = $this->solution->singleNumber($nums);
        $this->assertEquals(1, $response);
    }

    public function testSample2()
    {
        $nums = [4,1,2,1,2];
        $response = $this->solution->singleNumber($nums);
        $this->assertEquals(4, $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNumber($nums)
    {
        $map = [];
        foreach ($nums as $item) {
            if (isset($map[$item])) {
                unset($map[$item]);
            } else {
                $map[$item] = $item;
            }
        }
        return array_pop($map);
    }
}