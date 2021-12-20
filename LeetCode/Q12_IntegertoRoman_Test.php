<?php
namespace LeetCode\Q12;
use PHPUnit\Framework\TestCase;

class Q12_IntegerToRoman_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function test_3應該回傳III()
    {
        $int = 3;
        $response = $this->solution->intToRoman($int);
        $this->assertEquals("III", $response);
    }

    public function test_58應該回傳LVIII()
    {
        $int = 58;
        $response = $this->solution->intToRoman($int);
        $this->assertEquals("LVIII", $response);
    }

    public function test_1994應該回傳MCMXCIV()
    {
        $int = 1994;
        $response = $this->solution->intToRoman($int);
        $this->assertEquals("MCMXCIV", $response);
    }

    public function test_2399應該回傳MMCCCXCIX()
    {
        $int = 2399;
        $response = $this->solution->intToRoman($int);
        $this->assertEquals("MMCCCXCIX", $response);
    }
}

class Solution
{
    /**
     * @param Integer $num
     * @return String
     */
    function intToRoman($num)
    {
        $values = [
            // 個
                0 => "",
                1 => "I",
                2 => "II",
                3 => "III",
                4 => "IV",
                5 => "V",
                6 => "VI",
                7 => "VII",
                8 => "VIII",
                9 => "IX",
            // 十
                10 => "X",
                20 => "XX",
                30 => "XXX",
                40 => "XL",
                50 => "L",
                60 => "LX",
                70 => "LXX",
                80 => "LXXX",
                90 => "XC",
            // 百
                 100 => "C",
                 200 => "CC",
                 300 => "CCC",
                 400 => "CD",
                 500 => "D",
                 600 => "DC",
                 700 => "DCC",
                 800 => "DCCC",
                 900 => "CM",
            // 千
                 1000 => "M",
                 2000 => "MM",
                 3000 => "MMM",
        ];

        $base = 1;
        $result = "";
        do {
            $bit = pow(10, $base);

            // 每次取一位出來
            $mode = $num % $bit;
            $result = $values[$mode] . $result;
            $num -= $mode;

            // 進位
            $base++;
        } while ($num > 0);

        return $result;
    }
}