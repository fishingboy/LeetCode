<?php
namespace LeetCode\Q39;
use PHPUnit\Framework\TestCase;

class Q39_CombinationSum_Test extends TestCase
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
        $candidates = [2,3,6,7];
        $target = 7;
        $response = $this->solution->combinationSum($candidates, $target);
        $this->assertEquals([[2,2,3],[7]], $response);
    }
}

class Solution
{
    private $candidates;
    private $solutions;
    private $count;

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    public function combinationSum($candidates, $target)
    {
        sort($candidates);
        $this->candidates = $candidates;
        $this->count = count($candidates);
        $this->solutions = [];
        $this->find($target, [], 0);
        return $this->solutions;
    }

    public function find($remaining, $output, $index)
    {
        for ($i=$index; $i < $this->count ;$i++) {
            $item = $this->candidates[$i];
            if ($item == $remaining) {
                // find
                $output[] = $item;
                $this->solutions[] = $output;
                break;
            } else if ($item < $remaining) {
                $new_output = array_merge($output, [$item]);
                $this->find($remaining - $item, $new_output, $i);
            }
        }
    }
}