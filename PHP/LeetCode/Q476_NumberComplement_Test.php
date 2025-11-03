<?php
namespace LeetCode\Q476;
use PHPUnit\Framework\TestCase;

class Q476_NumberComplement_Test extends TestCase
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
        $num = 5;
        $response = $this->solution->findComplement($num);
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        $num = 1;
        $response = $this->solution->findComplement($num);
        $this->assertEquals(0, $response);
    }
}

class Solution
{
    /**
     * @param Integer $num
     * @return Integer
     */
    function findComplement($num)
    {
        $complement = 0;
        $base = 1;
        while ($num > 0) {
            if ($num % 2 == 0) {
                $complement += $base;
            }

            $num = (int)($num/2);
            $base *= 2;
        }
        return $complement;
    }
}