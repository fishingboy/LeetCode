<?php
namespace LeetCode\Q15;
use PHPUnit\Framework\TestCase;

class Q15_3Sum_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testExample1()
    {
        $nums = [-1, 0, 1, 2, -1, -4];
        $response = $this->solution->threeSum($nums);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([
            [-1, -1, 2],
            [-1, 0, 1],
        ], $response);
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