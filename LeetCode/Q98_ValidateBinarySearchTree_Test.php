<?php
namespace LeetCode\Q98;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q98_ValidateBinarySearchTree_Test extends TestCase
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
        $nums = [2,1,3];
        $root = $this->buildTree($nums);
        $response = $this->solution->isValidBST($root);
        $this->assertTrue($response);
    }

    public function testSample2()
    {
        $nums =  [5,1,4,null,null,3,6];
        $root = $this->buildTree($nums);
        $response = $this->solution->isValidBST($root);
        $this->assertFalse($response);
    }

    public function test_wa1()
    {
        $nums =  [1,1];
        $root = $this->buildTree($nums);
        $response = $this->solution->isValidBST($root);
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
class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isValidBST($root)
    {
        if (null !== $root->left && $root->left->val > $root->val) {
            return false;
        }
        if (null !== $root->right && $root->right->val < $root->val) {
            return false;
        }
        if (null !== $root->left && ! $this->isValidBST($root->left)) {
            return false;
        }
        if (null !== $root->right &&  ! $this->isValidBST($root->right)) {
            return false;
        }
        return true;
    }
}