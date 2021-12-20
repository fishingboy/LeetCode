<?php
namespace LeetCode\Q137;
use PHPUnit\Framework\TestCase;

class Q137_SingleNumberII_Test extends TestCase
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
        $nums = [2,2,3,2];
        $response = $this->solution->singleNumber($nums);
        $this->assertEquals(3, $response);
    }

    public function testSample2()
    {
        $nums = [0,1,0,1,0,1,99];
        $response = $this->solution->singleNumber($nums);
        $this->assertEquals(99, $response);
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
                $map[$item]["lack"]--;
                if ($map[$item]["lack"] == 0) {
                    unset($map[$item]);
                }
            } else {
                $map[$item] = [
                    "value" => $item,
                    "lack" => 2,
                ];
            }
        }
        return array_pop($map)["value"];
    }
}