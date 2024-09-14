<?php
namespace LeetCode\Q8;
use PHPUnit\Framework\TestCase;

class Q8_StringToInteger_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->myAtoi($test['args']['s']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }
}

class Solution
{
    /**
     * @var int
     */
    private $min;

    /**
     * @var int
     */
    private $max;

    public function __construct()
    {
        $this->min = - 1 * pow(2, 31);
        $this->max = pow(2, 31) -1;
    }

    /**
     * @param String $str
     * @return Integer
     */
    public function myAtoi(string $str): int
    {
        $number_str = $this->getNumberString($str);

        $answer = intval($number_str);
        if ($answer > $this->max) {
            return $this->max;
        } else if ($answer < $this->min) {
            return $this->min;
        } else {
            return $answer;
        }
    }

    public function getNumberString($str)
    {
        $word = "";
        $count = 0;
        for ($i=0; $i <strlen($str) && $count < 2; $i++) {
            if ($str[$i] == ' ') {
                if ($word != "") {
                    if (preg_match("/^[\-0-9.+]+/", $word, $matches)) {
                        return $matches[0];
                    }
                    $word = "";
                    $count++;
                }
            } else {
                $word .= $str[$i];
            }
        }

        if (preg_match("/^[\-0-9.+]+/", $word, $matches)) {
            return $matches[0];
        } else {
            return "";
        }
    }
}