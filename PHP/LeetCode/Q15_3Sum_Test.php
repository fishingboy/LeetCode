<?php
namespace LeetCode\Q15;
use PHPUnit\Framework\TestCase;

/**
 * 3 Sum
 */
class Q15_3Sum_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->threeSum($test['args']['nums']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution {
    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums)
    {
        // 重整為 key -> value
        $key_array = [];
        foreach ($nums as $num) {
            if (isset($key_array[$num])) {
                $key_array[$num]["count"]++;
            } else {
                $key_array[$num] = [
                    "value" => $num,
                    "count" => 1,
                ];
            }
        }

        // 建立一般陣列的 refer
        $value_array = [];
        $i = 0;
        foreach ($key_array as $key => $value) {
            $value_array[$i++] = & $key_array[$key];
        }

        $results = [];
        $count = count($value_array);
        for ($i=0; $i<$count; $i++) {
            // 取出一個數字
            $num1 = $value_array[$i]["value"];

            // 數量 -1
            $value_array[$i]["count"]--;

            for ($j=$i; $j<$count; $j++) {
                if ($value_array[$j]["count"] > 0) {
                    // 取出第二個數字
                    $num2 = $value_array[$j]["value"];

                    // 數量 -1
                    $value_array[$j]["count"]--;

                    // 如果餘數存在，就存到答案裡
                    $num3 = -1 * ($num1 + $num2);
                    if (isset($key_array[$num3]) && $key_array[$num3]["count"] > 0) {
                        $answer = [
                            $num1, $num2, $num3
                        ];
                        sort($answer);
                        $hash_key = implode("", $answer);
                        $results[$hash_key] = $answer;
                    }

                    // 數量 +1
                    $value_array[$j]["count"]++;
                }
            }
            // 數量 +1
            $value_array[$i]["count"]++;
        }

        return array_values($results);
    }
}