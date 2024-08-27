<?php
namespace LeetCode\Q40;
use PHPUnit\Framework\TestCase;

class Q40_CombinationSumII_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function test_count()
    {
        $candidates = [1,2,1,2,2];;
        $response = $this->solution->countCandidates($candidates);
        $this->assertEquals([
            [
                "number" => 1,
                "quota" => 2,
            ],
            [
                "number" => 2,
                "quota" => 3,
            ],
        ], $response);
    }
    
    public function testSample1()
    {
        $candidates = [10,1,2,7,6,1,5]; $target = 8;
        $response = $this->solution->combinationSum2($candidates, $target);
        $this->assertEquals([
            [1,1,6],
            [1,2,5],
            [1,7],
            [2,6]
        ], $response);
    }

    public function testWa1()
    {
        $candidates = [1,2]; $target = 4;
        $response = $this->solution->combinationSum2($candidates, $target);
        $this->assertEquals([], $response);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
    }
}

class Solution
{
    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    public function combinationSum2($candidates, $target)
    {
        sort($candidates);
        $candidates = $this->countCandidates($candidates);
        $count = count($candidates);

        $solutions = [];

        $stack = [];
        $remaining = $target; $output = [];$index = 0;
        while (true) {
            $item = $candidates[$index]['quota'];
        }

        return $solutions;
    }

    /**
     * @param array $candidates
     * @return array
     */
    public function countCandidates(array $candidates)
    {
        $count = [];
        foreach ($candidates as $candidate) {
            if (!isset($count[$candidate])) {
                $count[$candidate] = [
                    "number" => $candidate,
                    "quota" => 1,

                ];
            } else {
                $count[$candidate]["quota"]++;
            }
        }
        return array_values($count);
    }
}