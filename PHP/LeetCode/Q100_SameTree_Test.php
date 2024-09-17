<?php
namespace LeetCode\Q100;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q100_SameTree_Test extends TestCase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $root = $this->buildTree($test['args']['tree']);
            $root2 = $this->buildTree($test['args']['tree2']);
            $response = $solution->isSameTree($root, $root2);
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
     * @param TreeNode $p
     * @param TreeNode $q
     * @return Boolean
     */
    function isSameTree($p, $q)
    {
        $queue_p = [$p];
        $queue_q = [$q];

        while (count($queue_p) || count($queue_q)) {
            $node_p = array_shift($queue_p);
            $node_q = array_shift($queue_q);
            if ($node_p->val !== $node_q->val) {
                return false;
            }

            if ($node_p->left && $node_q->left) {
                array_push($queue_p, $node_p->left);
                array_push($queue_q, $node_q->left);
            } else if ($node_p->left || $node_q->left) {
                return false;
            }

            if ($node_p->right && $node_q->right) {
                array_push($queue_p, $node_p->right);
                array_push($queue_q, $node_q->right);
            } else if ($node_p->right || $node_q->right) {
                return false;
            }
        }
        return true;
    }
}

/**
 * Next challenges:
 * Easy https://leetcode.com/problems/flood-fill/
 * Easy https://leetcode.com/problems/leaf-similar-trees/
 * Medium https://leetcode.com/problems/binary-tree-coloring-game/
 */