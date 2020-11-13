<?php
namespace LeetCode\Q40;
use PHPUnit\Framework\TestCase;

class Q40_CombinationSumII_Test extends TestCase
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
        $candidates = [10,1,2,7,6,1,5]; $target = 8;
        $response = $this->solution->combinationSum2($candidates, $target);
        $this->assertArraySubset([
            [1,1,6],
            [1,2,5],
            [1,7],
            [2,6]
        ], $response);
    }
}

class Solution
{
    private $candidates;
    private $count;
    private $solutions;

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    public function combinationSum2($candidates, $target)
    {
        sort($candidates);
        $this->candidates = $candidates;
        $this->count = count($candidates);
        $this->solutions = [];
        $this->find($target, [], 0);

        // 解開答案
        $solutions = [];
        foreach ($this->solutions as $solution) {
            $solutions[] = explode("#", $solution);
        }
        return $solutions;
    }

    public function find($remaining, $output, $index)
    {
        for ($i=$index; $i < $this->count ;$i++) {
            $item = $this->candidates[$i];
            if ($item == $remaining) {
                // find
                $output[] = $item;
                $answer = implode("#",$output);
                $this->solutions[$answer] = $answer;
                break;
            } else if ($item < $remaining) {
                $new_output = array_merge($output, [$item]);
                $this->find($remaining - $item, $new_output, $i+1);
            }
        }
    }
}