<?php
namespace LeetCode\Q7;
use PHPUnit\Framework\TestCase;

class Q7_ReverseInteger_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->reverse($test['args']['x']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x)
    {
        $sign = ($x < 0) ? -1 : 1;
        $str = "" . abs($x);
        $new_x = "";

        // 反轉
        $len = strlen($str);
        for ($i = $len - 1; $i >= 0; $i--) {
            $new_x .= $str[$i];
        }

        // 判斷溢位
        $v = $sign * $new_x;
        if ($v > 2147483647 || $v < -2147483648) {
            return 0;
        } else {
            return $v;
        }
    }
}