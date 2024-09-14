<?php
namespace LeetCode\Q4;
use PHPUnit\Framework\TestCase;

/**
 * Median Of Two Sorted Arrays
 */
class Q4_MedianOfTwoSortedArrays_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->findMedianSortedArrays($test['args']['nums1'], $test['args']['nums2']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
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