<?php
namespace LeetCode\Q110;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q110_BalancedBinaryTree_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function buildTree($nums): TreeNode
    {
        $builder = new TreeBuilder($nums);
        return $builder->getRoot();
    }

    public function testSample1()
    {
        $tree = [3,9,20,null,null,15,7];
        $root = $this->buildTree($tree);
        $response = $this->solution->maxDepth($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(3, $response);
    }

    public function testSample2()
    {
        $tree = [1,null,2];
        $root = $this->buildTree($tree);
        $response = $this->solution->maxDepth($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(2, $response);
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
    function isBalanced($root)
    {

    }
}