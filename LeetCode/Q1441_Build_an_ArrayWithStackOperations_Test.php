<?php
namespace LeetCode\Q1441;
use PHPUnit\Framework\TestCase;

class Q1441_Build_an_ArrayWithStackOperations_Test extends TestCase
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
        $target = [1,3];
        $n = 3;
        $response = $this->solution->buildArray($target, $n);
        $this->assertEquals(["Push","Push","Pop","Push"], $response);
    }

    public function testSample2()
    {
        $target = [1,2,3];
        $n = 3;
        $response = $this->solution->buildArray($target, $n);
        $this->assertEquals(["Push","Push","Push"], $response);
    }

    public function testSample3()
    {
        $target = [1,2];
        $n = 4;
        $response = $this->solution->buildArray($target, $n);
        $this->assertEquals(["Push","Push"], $response);
    }
}

class Solution
{
    /**
     * @param Integer[] $target
     * @param Integer $n
     * @return String[]
     */
    function buildArray($target, $n)
    {
        $answer = [];

        $i = 0;
        foreach ($target as $item) {
            while ($i < $item) {
                $i++;
                if ($item == $i) {
                    $answer[] = "Push";
                } else {
                    $answer[] = "Push";
                    $answer[] = "Pop";
                }
            }
        }

        return $answer;
    }
}