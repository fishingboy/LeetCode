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

    public function test_count()
    {
        $candidates = [1,2,1,2,2];;
        $response = $this->solution->countCandidates($candidates);
        $this->assertArraySubset([
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
        $this->assertArraySubset([
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
        $this->assertArraySubset([], $response);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
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
        $this->candidates = $this->countCandidates($candidates);
        $this->count = count($this->candidates);
        $this->solutions = [];
        $this->find($target, [], 0);
        return $this->solutions;
    }

    public function find($remaining, $output, $index)
    {
        for ($i=$index; $i < $this->count ;$i++) {
            if  ($this->candidates[$i]['quota'] == 0) {
                continue;
            }

            $item = $this->candidates[$i]['number'];
            if ($item == $remaining) {
                // find
                $output[] = $item;
                $this->solutions[] = $output;
                break;
            } else if ($item < $remaining) {
                $new_output = array_merge($output, [$item]);
                $this->candidates[$index]['quota']--;
                $this->find($remaining - $item, $new_output, $i);
                $this->candidates[$index]['quota']++;
            }
        }
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