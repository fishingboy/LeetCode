<?php
namespace LeetCode\Q39;
use PHPUnit\Framework\TestCase;

class Q39_CombinationSum_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->combinationSum($test['args']['candidates'], $test['args']['target']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
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