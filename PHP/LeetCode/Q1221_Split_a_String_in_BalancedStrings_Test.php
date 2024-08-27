<?php
namespace LeetCode\Q1221;
use PHPUnit\Framework\TestCase;

class Q1221_Split_a_String_in_BalancedStrings_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $s = "RLRRLLRLRL";
        $response = $this->solution->balancedStringSplit($s);
        $this->assertEquals(4, $response);
    }

    public function testSample2()
    {
        $s = "RLLLLRRRLR";
        $response = $this->solution->balancedStringSplit($s);
        $this->assertEquals(3, $response);
    }

    public function testSample3()
    {
        $s = "LLLLRRRR";
        $response = $this->solution->balancedStringSplit($s);
        $this->assertEquals(1, $response);
    }

    public function testSample4()
    {
        $s = "RLRRRLLRLL";
        $response = $this->solution->balancedStringSplit($s);
        $this->assertEquals(2, $response);
    }
}

class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function balancedStringSplit($s)
    {
        $len = strlen($s);
        $total = 0;
        $value = 0;
        for ($i=0; $i<$len; $i++) {
            $value += ($s[$i] == 'L') ? 1 : -1;
            if ($value == 0) {
                $total++;
            }
        }
        return $total;
    }
}