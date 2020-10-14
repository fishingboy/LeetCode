<?php
namespace LeetCode\Q238;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q238_Product_of_ArrayExceptSelf_Test extends TestCase
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
        $nums = [1,2,3,4];
        $response = $this->solution->productExceptSelf($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([24,12,8,6], $response);
    }

    public function test_WA1()
    {
        $nums = [0,0];
        $response = $this->solution->productExceptSelf($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([0,0], $response);
    }

    public function test_WA2()
    {
        $nums = [1,0];
        $response = $this->solution->productExceptSelf($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([0,1], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function productExceptSelf($nums)
    {
        $n = 1;
        foreach ($nums as $i => $num) {
            if ($num != 0) {
                $n *= $num;
            }
        }
        foreach ($nums as $i => $num) {
            if ($num == 0) {
                $nums[$i] = 0;
            } else {
                $nums[$i] = $n / $num;
            }
        }
        return $nums;
    }
}