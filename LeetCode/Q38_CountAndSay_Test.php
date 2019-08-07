<?php
namespace LeetCode\Q38;
use PHPUnit\Framework\TestCase;

class Q38_CountAndSay_Test extends TestCase
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
        $n = 5;
        $response = $this->solution->countAndSay($n);
        $this->assertEquals("111221", $response);
    }
}

class Solution
{
    private $max_n = 30;

    private $results = ["0", "1"];

    public function __construct()
    {
        for ($i = 2; $i <= $this->max_n; $i++) {
            $word = $this->results[$i - 1];
            $word_length = strlen($word);
            $result = "";
            $pre_w = null;
            $count = 0;
            for ($j=0; $j < $word_length; $j++) {
                $w = $word[$j];
                if ($w == $pre_w || $pre_w === null) {
                    $count++;
                } else {
                    $result .= "{$count}{$pre_w}";
                    $count = 1;
                }
                $pre_w = $w;
            }
            $result .= "{$count}{$pre_w}";
            $this->results[$i] = $result;
        }
    }

    /**
     * @param Integer $n
     * @return String
     */
    function countAndSay($n)
    {
        return $this->results[$n];
    }
}