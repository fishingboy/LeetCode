<?php
namespace LeetCode\Q1431;
use PHPUnit\Framework\TestCase;

class Q1431_KidsWithTheGreatestNumberOfCandies_Test extends TestCase
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
        $candies = [2,3,5,1,3];
        $extraCandies = 3;
        $response = $this->solution->kidsWithCandies($candies, $extraCandies);
        $this->assertArraySubset([true,true,true,false,true], $response);
    }

    public function testSample2()
    {
        $candies = [4,2,1,1,2];
        $extraCandies = 1;
        $response = $this->solution->kidsWithCandies($candies, $extraCandies);
        $this->assertArraySubset([true,false,false,false,false], $response);
    }

    public function testSample3()
    {
        $candies = [12,1,12]; $extraCandies = 10;
        $response = $this->solution->kidsWithCandies($candies, $extraCandies);
        $this->assertArraySubset([true,false,true], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies)
    {
        $max = max($candies);

        $answer = [];
        foreach ($candies as $candy) {
            $answer[] = ($candy + $extraCandies) >= $max;
        }

        return $answer;
    }
}