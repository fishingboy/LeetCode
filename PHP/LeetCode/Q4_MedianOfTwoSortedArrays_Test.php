<?php
namespace LeetCode\Q4;
use PHPUnit\Framework\TestCase;

/**
 * Median Of Two Sorted Arrays
 */
class Q4_MedianOfTwoSortedArrays_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }
    
    public function testSample()
    {
        $nums1 = [1, 3];
        $nums2 = [2];
        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        $nums1 = [1, 2];
        $nums2 = [3, 4];
        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
        $this->assertEquals(2.5, $response);
    }

    public function testBoundary1()
    {
        $nums1 = [1, 2, 3, 4];
        $nums2 = [];
        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
        $this->assertEquals(2.5, $response);
    }

    public function testBoundary2()
    {
        $nums1 = [4];
        $nums2 = [];
        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
        $this->assertEquals(4, $response);
    }

    public function testBoundary3()
    {
        $nums1 = [1,1,1,1,1,1];
        $nums2 = [1,1,1,1,1,1];
        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
        $this->assertEquals(1, $response);
    }

    public function testBoundary4()
    {
        $nums1 = [1,1,1,1,1,1];
        $nums2 = [1,1,1,1,1];
        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
        $this->assertEquals(1, $response);
    }

//    public function testBoundary5()
//    {
//        $nums1 = [4, 3];
//        $nums2 = [2, 1];
//        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
//        $this->assertEquals(2.5, $response);
//    }
}

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2)
    {
        // 計算總數
        $cnt = count($nums1) + count($nums2);

        // 提前跳出位置
        $break_index = intval($cnt / 2) + 1;

        $new_array = [];
        for ($i=1; ;$i++) {
            // 兩個陣列都清空就跳出
            if (count($nums1) == 0 && count($nums2) == 0) {
                break;
            }

            // 超過中位數範圍就不要再算了
            if ($i > $break_index) {
                break;
            }

            // 插入排序法
            if (count($nums1) == 0) {
                $number = array_shift($nums2);
            } else if (count($nums2) == 0) {
                $number = array_shift($nums1);
            } else if ($nums1[0] < $nums2[0]) {
                $number = array_shift($nums1);
            } else {
                $number = array_shift($nums2);
            }
            $new_array[] = $number;
        }

        // 計算中位數
        if ($cnt % 2 == 1) {
            $index = ($cnt + 1) / 2 - 1;
            return $new_array[$index];
        } else {
            $index = $cnt / 2 - 1;
            return ($new_array[$index] + $new_array[$index + 1]) / 2;
        }
    }
}