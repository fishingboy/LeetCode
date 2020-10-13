<?php
namespace LeetCode\Q771;
use PHPUnit\Framework\TestCase;

class Q771_Jewels_and_Stones_Test extends TestCase
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
        $J = "aA"; $S = "aAAbbbb";
        $response = $this->solution->numJewelsInStones($J, $S);
        $this->assertEquals(3, $response);
    }

    public function testSample2()
    {
        $J = "z"; $S = "ZZ";
        $response = $this->solution->numJewelsInStones($J, $S);
        $this->assertEquals(0, $response);
    }
}

class Solution
{
    /**
     * @param String $J
     * @param String $S
     * @return Integer
     */
    function numJewelsInStones($J, $S)
    {
        $len = strlen($J);
        $mapping = [];
        for ($i=0; $i<$len; $i++) {
            $mapping[$J[$i]] = 1;
        }

        $total = 0;
        $len = strlen($S);
        for ($i=0; $i<$len; $i++) {
            $word = $S[$i];
            if (isset($mapping[$word])) {
                $total++;
            }
        }

        return $total;
    }
}