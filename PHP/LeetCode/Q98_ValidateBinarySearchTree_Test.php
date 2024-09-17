<?php
namespace LeetCode\Q98;
use Library\TestBase;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q98_ValidateBinarySearchTree_Test extends TestBase
{
    public function testFromTestData()
    {
        $solution = new Solution();
        $question_no = explode("_", basename(__FILE__))[0];
        $tests = json_decode(file_get_contents( "./TestData/{$question_no}.json"), true);
        foreach ($tests as $test) {
            $root = $this->buildTree($test['args']['nums']);
            $response = $solution->isValidBST($root);
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
     * @return Boolean
     */
    function isValidBST($root)
    {
        return $this->valid($root);
    }

    /**
     * @param TreeNode $root
     * @param int $max
     * @param int $min
     * @return bool
     */
    public function valid($root, $max = null, $min = null)
    {
        if (null !== $max && $root->val <= $max) {
            return false;
        }

        if (null !== $min && $root->val >= $min) {
            return false;
        }

        // 左邊節點要小
        if (null !== $root->left && $root->left->val >= $root->val) {
            return false;
        }
        // 右邊節點要大
        if (null !== $root->right && $root->right->val <= $root->val) {
            return false;
        }

        if (null !== $root->left) {
            $new_min = (null == $min || $root->val < $min) ? $root->val : $min;
            if (! $this->valid($root->left, $max, $new_min)) {
                return false;
            }
        }
        if (null !== $root->right) {
            $new_max = (null == $max || $root->val > $max) ? $root->val : $max;
            if (! $this->valid($root->right, $new_max, $min)) {
                return false;
            }
        }
        return true;
    }
}