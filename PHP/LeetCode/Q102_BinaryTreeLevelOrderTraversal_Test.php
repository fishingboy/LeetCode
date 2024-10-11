<?php
namespace LeetCode\Q102;
use Library\TestBase;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

/**
 * Binary Tree Level Order Traversal
 * @tag 樹
 */
class Q102_BinaryTreeLevelOrderTraversal_Test extends TestBase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $root = $this->buildTree($test['args']['tree']);
            $response = $solution->levelOrder($root);
            $this->assertEquals($test['expected'], $response, "[{$test['name']}] test failed");
        }
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
     * @return Integer[][]
     */
    function levelOrder($root)
    {
        if ( ! $root) {
            return [];
        }

        $answer = [
            [$root->val]
        ];
        $node_queue[] = $root;
        while (count($node_queue)) {

            // 取出同層的值
            $level_nums = [];
            $next_queue = [];
            while ($node = array_shift($node_queue)) {
                if ($node->left && $node->left->val !== null) {
                    $level_nums[] = $node->left->val;
                }
                if ($node->right && $node->right->val !== null) {
                    $level_nums[] = $node->right->val;
                }

                if ($node->left !== null) {
                    $next_queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $next_queue[] = $node->right;
                }
            }

            if (count($level_nums)) {
                $answer[] = $level_nums;

                // 往下一層走訪
                $node_queue = $next_queue;
            }
        }
        return $answer;
    }
}


/**
 * Next challenges:
 * https://leetcode.com/problems/course-schedule-ii/
 * https://leetcode.com/problems/binary-tree-longest-consecutive-sequence-ii/
 * https://leetcode.com/problems/escape-a-large-maze/
 */