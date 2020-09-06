<?php
namespace LeetCode\Q17;
use PHPUnit\Framework\TestCase;

class Q17_LetterCombinationsOf_a_PhoneNumber_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testExample1()
    {
        $digits = "23";
        $response = $this->solution->letterCombinations($digits);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset(["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"], $response);
    }

    public function test_WA1()
    {
        $digits = "";
        $response = $this->solution->letterCombinations($digits);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([], $response);
    }
}

class Solution
{
    /**
     * @var array
     */
    private $words;
    /**
     * @var int
     */
    private $len;
    /**
     * @var array
     */
    private $answers;

    /**
     * @param String $digits
     * @return String[]
     */
    function letterCombinations($digits)
    {
        $mapping = [
            "2" => ["a","b","c"],
            "3" => ["d","e","f"],
            "4" => ["g","h","i"],
            "5" => ["j","k","l"],
            "6" => ["m","n","o"],
            "7" => ["p","q","r","s"],
            "8" => ["t","u","v"],
            "9" => ["w","x","y","z"],
        ];

        $this->len = strlen($digits);

        if ($this->len == 0) {
            return [];
        }

        $this->words = [];
        for ($i=0; $i<$this->len; $i++) {
            $number = $digits[$i];
            $this->words[] = $mapping[$number];
        }

        $this->answers = [];
        $this->recursion_search("", 0);

        return $this->answers;
    }

    /**
     * 遞迴走訪 - 先深法 DFS
     * @param string $answer
     * @param int $deep
     */
    function recursion_search($answer = "", $deep = 0)
    {
        if ($deep == $this->len) {
            $this->answers[] = $answer;
        } else {
            foreach ($this->words[$deep] as $word)
            {
                $this->recursion_search($answer . $word, $deep + 1);
            }
        }
    }
}
