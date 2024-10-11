<?php
namespace LeetCode\Q136;
use PHPUnit\Framework\TestCase;

class Q136_SingleNumber_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->singleNumber($test['args']['nums']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
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