<?php
namespace LeetCode\Q1389;
use PHPUnit\Framework\TestCase;

class Q1389_CreateTargetArray_in_the_GivenOrder_Test extends TestCase
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
        $nums = [0,1,2,3,4]; $index = [0,1,2,2,1];
        $response = $this->solution->createTargetArray($nums, $index);
        $this->assertArraySubset([0,4,1,3,2], $response);
    }

    public function testSample2()
    {
        $nums = [1,2,3,4,0]; $index = [0,1,2,3,0];
        $response = $this->solution->createTargetArray($nums, $index);
        $this->assertArraySubset([0,1,2,3,4], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer[] $index
     * @return Integer[]
     */
    function createTargetArray($nums, $index)
    {
        $answer = [];
        $count = 0;
        foreach ($nums as $i => $num) {
            $pos = $index[$i];
            if (isset($answer[$pos])) {
                for ($j = $count; $j > $pos; $j--) {
                    $answer[$j] = $answer[$j-1];
                }
            }
            $answer[$pos] = $num;
            $count++;
        }
        return $answer;
    }
}