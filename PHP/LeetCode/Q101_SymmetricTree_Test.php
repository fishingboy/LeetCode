<?php
namespace LeetCode\Q101;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q101_SymmetricTree_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $root = $this->buildTree($test['args']['tree']);
            $response = $solution->isSymmetric($root);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
    }

    public function buildTree($nums): TreeNode
    {
        $builder = new TreeBuilder($nums);
        return $builder->getRoot();
    }
}

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{
    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isSymmetric($root)
    {
        $node_queue[] = $root;
        while (count($node_queue)) {

            // 取出同層的值
            $level_nums = [];
            $next_queue = [];
            while ($node = array_shift($node_queue)) {
                $level_nums[] = $node->left->val ?? null;
                $level_nums[] = $node->right->val ?? null;

                if ($node->left !== null) {
                    $next_queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $next_queue[] = $node->right;
                }
            }

            // 判斷有沒有對稱
            while (count($level_nums)) {
                $head = array_shift($level_nums);
                $foot = array_pop($level_nums);
                if ($head !== $foot) {
                    return false;
                }
            }

            // 往下一層走訪
            $node_queue = $next_queue;
        }
        return true;
    }
}

/**
 * Next challenges:
 * https://leetcode.com/problems/course-schedule-ii/
 * https://leetcode.com/problems/binary-tree-longest-consecutive-sequence-ii/
 * https://leetcode.com/problems/escape-a-large-maze/
 */