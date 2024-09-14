<?php
namespace LeetCode\Q13;
use PHPUnit\Framework\TestCase;

class Q13_RomanToInteger_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->romanToInt($test['args']['roman']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    public function romanToInt($s)
    {
        $values = [
            // 個
            [
                "VIII" => 8,
                "III" => 3,
                "VII" => 7,
                "II" => 2,
                "IV" => 4,
                "VI" => 6,
                "IX" => 9,
                "I" => 1,
                "V" => 5,
            ],
            // 十
            [
                "LXXX" => 80,
                "XXX" => 30,
                "LXX" => 70,
                "XX" => 20,
                "XL" => 40,
                "LX" => 60,
                "XC" => 90,
                "X" => 10,
                "L" => 50,
            ],
            // 百
            [
                "DCCC" => 800,
                "CCC" => 300,
                "DCC" => 700,
                "CC" => 200,
                "CD" => 400,
                "DC" => 600,
                "CM" => 900,
                "C" => 100,
                "D" => 500,
            ],
            // 千
            [
                "MMM" => 3000,
                "MM" => 2000,
                "M" => 1000,
            ],
        ];

        $total = 0;
        foreach ($values as $groups => $group) {
            foreach ($group as $word => $value) {
                if (strpos($s, $word) !== false) {
                    $total += $value;
                    $s     = str_replace($word, "", $s);
                    if ($s == "") {
                        break 2;
                    }
                    break;
                }
            }
        }

        return $total;
    }
}