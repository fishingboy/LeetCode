<?php
namespace LeetCode\Q27;
use PHPUnit\Framework\TestCase;

class Q27_RemoveElement_Test extends TestCase
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
        $array = [3,2,2,3];
        $val = 3;
        $response = $this->solution->removeElement($array, $val);
        $this->assertEquals(2, $response);
        $this->assertEquals([2,2], $array);
    }

    public function testSample2()
    {
        $array = [0,1,2,2,3,0,4,2];
        $val = 2;
        $response = $this->solution->removeElement($array, $val);
        $this->assertEquals(5, $response);
        $this->assertEquals([0,1,3,0,4], $array);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val)
    {
        $result = [];
        foreach ($nums as $num) {
            if ($num != $val) {
                $result[] = $num;
            }
        }
        $nums = $result;
        return count($result);
    }
}