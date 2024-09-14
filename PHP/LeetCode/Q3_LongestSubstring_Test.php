<?php
namespace LeetCode\Q3;
use PHPUnit\Framework\TestCase;

/**
 * Longest Substring
 */
class Q3_LongestSubstring_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $response = $solution->lengthOfLongestSubstring($test['args']['s']);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
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