<?php
namespace LeetCode\Q100;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q100_SameTree_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $tree = [1,2,3];
        $root = $this->buildTree($tree);
        $tree2 = [1,2,3];
        $root2 = $this->buildTree($tree2);
        $response = $this->solution->isSameTree($root, $root2);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertTrue($response);
    }

    public function testSample2()
    {
        $tree = [1,2];
        $root = $this->buildTree($tree);
        $tree2 = [1,null,2];
        $root2 = $this->buildTree($tree2);
        $response = $this->solution->isSameTree($root, $root2);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertFalse($response);
    }

    public function testSample3()
    {
        $tree = [1,2,1];
        $root = $this->buildTree($tree);
        $tree2 = [1,1,2];
        $root2 = $this->buildTree($tree2);
        $response = $this->solution->isSameTree($root, $root2);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertFalse($response);
    }

    public function buildTree($nums)
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