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

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $nums = [1,2,3,4];
        $response = $this->solution->productExceptSelf($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([24,12,8,6], $response);
    }

    public function test_WA1()
    {
        $nums = [0,0];
        $response = $this->solution->productExceptSelf($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([0,0], $response);
    }

    public function test_WA2()
    {
        $nums = [1,0];
        $response = $this->solution->productExceptSelf($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([0,1], $response);
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
        $count = count($nums);

        // 左邊乘積
        $l_product[0] = $nums[0];
        for ($i=1; $i<$count; $i++) {
            $l_product[$i] = $l_product[$i - 1] * $nums[$i];
        }

        // 右邊乘積
        $r_product[$count - 1] = $nums[$count - 1];
        for ($i = $count-2; $i >= 0; $i--) {
            $r_product[$i] = $r_product[$i + 1] * $nums[$i];
        }

        // 計算答案
        $answers = [];
        for ($i=0; $i<$count; $i++) {
            if ($i == 0) {
                $answers[$i] = $r_product[1];
            } else if ($i == $count - 1) {
                $answers[$i] = $l_product[$count -2];
            } else {
                $answers[$i] = $l_product[$i-1] * $r_product[$i+1];
            }
        }

        return $answers;
    }
}

/**
 * Next challenges:
 * Hard   https://leetcode.com/problems/trapping-rain-water/
 * Medium https://leetcode.com/problems/maximum-product-subarray/
 * Hard   https://leetcode.com/problems/paint-house-ii/
 */