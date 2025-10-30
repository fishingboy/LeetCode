<?php
namespace LeetCode\Q88;
use PHPUnit\Framework\TestCase;

class Q88_MergeSortedArray_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->merge(
                $test['args']['nums1'],
                $test['args']['m'],
                $test['args']['nums2'],
                $test['args']['n']
            );
            $this->assertEquals($test['expected'], $test['args']['nums1'], "[{$test['name']}] test failed");
        }
    }

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
        $nums1 = [1,2,3,0,0,0]; $m = 3;
        $nums2 = [2,5,6]; $n = 3;
        $this->solution->merge($nums1, $m, $nums2, $n);
        $this->assertEquals([1,2,2,3,5,6], $nums1);
    }
}

class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer $m
     * @param Integer[] $nums2
     * @param Integer $n
     * @return NULL
     */
    function merge(&$nums1, $m, $nums2, $n)
    {
        for ($i = $m + $n - 1; $i >= 0; $i--) {
            if ($m == 0) {
                $nums1[$i] = $nums2[$n - 1];
                $n--;
                continue;
            }

            if ($n == 0) {
                $nums1[$i] = $nums1[$m - 1];
                $m--;
                continue;
            }

            if ($nums1[$m-1] > $nums2[$n-1]) {
                $nums1[$i] = $nums1[$m-1];
                $m--;
            } else {
                $nums1[$i] = $nums2[$n-1];
                $n--;
            }
        }
    }
}