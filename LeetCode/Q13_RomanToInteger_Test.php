<?php
namespace LeetCode\Q13;
use PHPUnit\Framework\TestCase;

class Q13_RomanToInteger_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function test_III應該回傳3()
    {
        $roman = "III";
        $response = $this->solution->romanToInt($roman);
        $this->assertEquals(3, $response);
    }

    public function test_IV應該回傳4()
    {
        $roman = "IV";
        $response = $this->solution->romanToInt($roman);
        $this->assertEquals(4, $response);
    }

    public function test_VI應該回傳6()
    {
        $roman = "IV";
        $response = $this->solution->romanToInt($roman);
        $this->assertEquals(4, $response);
    }

    public function test_LVIII應該回傳58()
    {
        $roman = "LVIII";
        $response = $this->solution->romanToInt($roman);
        $this->assertEquals(58, $response);
    }

    public function test_MCMXCIV應該回傳1994()
    {
        $roman = "MCMXCIV";
        $response = $this->solution->romanToInt($roman);
        $this->assertEquals(1994, $response);
    }

    public function test_MMCCCXCIX應該回傳2399()
    {
        $roman = "MMCCCXCIX";
        $response = $this->solution->romanToInt($roman);
        $this->assertEquals(2399, $response);
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