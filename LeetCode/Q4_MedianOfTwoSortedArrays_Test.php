<?php
namespace LeetCode\Q4;
use PHPUnit\Framework\TestCase;

class Q4_MedianOfTwoSortedArrays_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }
    
    public function testSample()
    {
        // nums1 = [1, 3]
        // nums2 = [2]
        //
        // The median is 2.0

        $nums1 = [1, 3];
        $nums2 = [2];
        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        // nums1 = [1, 2]
        // nums2 = [3, 4]
        //
        // The median is (2 + 3)/2 = 2.5

        $nums1 = [1, 2];
        $nums2 = [3, 4];
        $response = $this->solution->findMedianSortedArrays($nums1, $nums2);
        $this->assertEquals(2.5, $response);
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
        $new_array = array_merge($nums1, $nums2);
        sort($new_array);
        echo "<pre>new_array = " . json_encode($new_array, JSON_PRETTY_PRINT + JSON_UNESCAPED_UNICODE) . "</pre>";

        $cnt = count($new_array);
        if ($cnt % 2 == 1) {
            $i = ($cnt + 1) / 2 - 1;
            return $new_array[$i];
        } else {
            $i = $cnt / 2 - 1;
            return ($new_array[$i] + $new_array[$i + 1]) / 2;
        }
    }
}