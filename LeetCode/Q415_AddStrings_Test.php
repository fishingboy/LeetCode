<?php
namespace LeetCode\Q415;
use PHPUnit\Framework\TestCase;

class Q415_AddStrings_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $a = "99999";
        $b = "999";
        $response = $this->solution->addStrings($a, $b);
        $this->assertEquals("100998", $response);
    }

    public function testSample2()
    {
        $a = "0";
        $b = "0";
        $response = $this->solution->addStrings($a, $b);
        $this->assertEquals("0", $response);
    }
}

class Solution
{
    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */
    function addStrings($num1, $num2)
    {
        $len1 = strlen($num1);
        $len2 = strlen($num2);

        $max = max($len1, $len2);

        $remaining = 0;
        $answer = "";
        for ($i=1; $i<=$max; $i++) {
            $n1 = $n2 = 0;
            if ($i <= $len1) {
                $n1 = intval($num1[$len1 - $i]);
            }
            if ($i <= $len2) {
                $n2 = intval($num2[$len2 - $i]);
            }

            $remaining = $n1 + $n2 + $remaining;
            $answer = ($remaining % 10) . $answer;
            $remaining = floor($remaining / 10);
        }

        if ($remaining) {
            $answer = $remaining . $answer;
        }

        return $answer;
    }
}