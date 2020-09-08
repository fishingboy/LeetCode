<?php
namespace LeetCode\Q101;
use PHPUnit\Framework\TestCase;

class Q101_SymmetricTree_Test extends TestCase
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
        $tree = [1,2,2,3,4,4,3];
        $root = $this->buildTree($tree);
        $response = $this->solution->isSymmetric($root);
        $this->assertTrue($response);
    }

    public function buildTree($nums)
    {
        $num = array_shift($nums);
        $root = new TreeNode($num);
        $node_queue[] = $root;
        while (count($nums)) {
            $node = array_shift($node_queue);
            $left_node = new TreeNode(array_shift($nums));
            $right_node = new TreeNode(array_shift($nums));
            $node->left = $left_node;
            $node->right = $right_node;
            $node_queue[] = $left_node;
            $node_queue[] = $right_node;
        }
        return $root;
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

    }
}

class TreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val   = $val;
        $this->left  = $left;
        $this->right = $right;
    }
}
