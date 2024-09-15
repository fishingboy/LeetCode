<?php
namespace LeetCode\Q66;
use PHPUnit\Framework\TestCase;

class Q66_PlusOne_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->plusOne($test['args']['digits']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits)
    {
        $count = count($digits);

        // 加 1
        $digits[$count - 1]++;

        // 進位
        $new_bit = false;
        for ($i = $count-1; $i >=0; $i--) {
            if ($digits[$i] < 10) {
                break;
            }
            $digits[$i] -= 10;

            if (isset($digits[$i - 1])) {
                $digits[$i - 1]++;
            } else {
                $new_bit = true;
            }
        }

        // 加新位數
        if ($new_bit) {
            return array_merge([1], $digits);
        } else {
            return $digits;
        }
    }
}