<?php
namespace LeetCode\Q104;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q104_MaximumDepthOfBinaryTree_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $root = $this->buildTree($test['args']['tree']);
            $response = $solution->maxDepth($root);
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
     * @return Integer
     */
    function maxDepth($root): int
    {
        if ( ! $root) {
            return 0;
        }

        $depth = 0;

        $node_queue[] = $root;
        while (count($node_queue)) {
            $depth++;

            // 取出同層的值
            $next_queue = [];
            while ($node = array_pop($node_queue)) {
                if ($node->left && $node->left->val !== null) {
                    $next_queue[] = $node->left;
                }
                if ($node->right && $node->right->val !== null) {
                    $next_queue[] = $node->right;
                }
            }

            // 往下一層走訪
            $node_queue = $next_queue;
        }
        return $depth;
    }
}