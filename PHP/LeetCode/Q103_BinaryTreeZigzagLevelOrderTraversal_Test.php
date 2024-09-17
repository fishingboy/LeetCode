<?php
namespace LeetCode\Q103;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q103_BinaryTreeZigzagLevelOrderTraversal_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $root = $this->buildTree($test['args']['tree']);
            $response = $solution->zigzagLevelOrder($root);
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
     * @return Integer[][]
     */
    function zigzagLevelOrder($root)
    {
        if ( ! $root) {
            return [];
        }

        // 方向: 0 左到右 1 右到左
        $way = 0;

        $answer = [
            [$root->val]
        ];
        $node_queue[] = $root;
        while (count($node_queue)) {
            echo $way;

            // 取出同層的值
            $level_nums = [];
            $next_queue = [];
            while ($node = array_pop($node_queue)) {
                if ($way) {
                    if ($node->left && $node->left->val !== null) {
                        $level_nums[] = $node->left->val;
                        $next_queue[] = $node->left;
                    }
                    if ($node->right && $node->right->val !== null) {
                        $level_nums[] = $node->right->val;
                        $next_queue[] = $node->right;
                    }
                } else {
                    if ($node->right && $node->right->val !== null) {
                        $level_nums[] = $node->right->val;
                        $next_queue[] = $node->right;
                    }
                    if ($node->left && $node->left->val !== null) {
                        $level_nums[] = $node->left->val;
                        $next_queue[] = $node->left;
                    }
                }
            }

            if (count($level_nums)) {
                $answer[] = $level_nums;

                // 往下一層走訪
                $node_queue = $next_queue;
            }

            // 換方向
            $way = ($way + 1) % 2;
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