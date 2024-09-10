<?php
namespace LeetCode\Q3;
use PHPUnit\Framework\TestCase;

/**
 * Longest Substring
 */
class Q3_LongestSubstring_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testFromTestData()
    {
        $tests = json_decode(file_get_contents( './TestData/Q3.json'), true);
        foreach ($tests as $test) {
            $response = $this->solution->lengthOfLongestSubstring($test['args']['s']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }


    public function testSample()
    {
        // Input: "abcabcbb"
        // Output: 3
        $s = "abcabcbb";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(3, $response);
    }

    public function testSample2()
    {
        // Input: "bbbbb"
        // Output: 1
        $s = "bbbbb";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(1, $response);
    }

    public function testSample3()
    {
        // Input: "pwwkew"
        // Output: 3
        $s = "pwwkew";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(3, $response);
    }

    public function testWa1()
    {
        // Input
        // " "
        // Output
        // 0
        // Expected
        // 1
        $s = " ";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(1, $response);
    }

    public function testWa2()
    {
        // Input
        // "au"
        // Output
        // 0
        // Expected
        // 2
        $s = " ";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(1, $response);
    }

    public function testWa3()
    {
        // Input
        // "aab"
        // Output
        // 1
        // Expected
        // 2
        $s = "aab";
        $response = $this->solution->lengthOfLongestSubstring($s);
        $this->assertEquals(2, $response);
    }

    public function testIsUnique()
    {
        $s = "abccd";
        $response = $this->solution->isUnique($s, 0, 1);
        $this->assertTrue($response);

        $response = $this->solution->isUnique($s, 0, 3);
        $this->assertFalse($response);
    }
}

class Solution
{
    /**
     * @param String $str
     * @return Integer
     */
    public function lengthOfLongestSubstring($str)
    {
        $len = strlen($str);

        $max = 0;
        for ($i = 0 ; $i <= $len-2; $i++) {
            $sub_len = 1;

            // 儲存已存在字母表
            $str_map = [$str[$i] => true];
            for ($j = $i + 1 ; $j <= $len-1; $j++) {
                // 如果字母重複了，就跳開
                if (isset($str_map[$str[$j]])) {
                    break;
                }

                // 儲存已存在字母表
                $str_map[$str[$j]] = true;

                // 長度 + 1
                $sub_len++;
            }

            // 找最大值
            if ($sub_len > $max) {
                $max = $sub_len;
            }
        }

        if ($max == 0) {
            $max = $len;
        }
        return $max;
    }

    /**
     * 判斷字串 str[j] 是否在 i ~ j - 1 中有出現過
     * @param string $str
     * @param int $i
     * @param int $j
     * @return bool
     */
    public function isUnique($str, $i, $j)
    {
        for ($k = $i; $k < $j; $k++) {
            if ($str[$k] == $str[$j]) {
                return false;
            }
        }
        return true;
    }
}