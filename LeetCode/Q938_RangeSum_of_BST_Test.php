<?php
namespace LeetCode\Q938;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q938_RangeSum_of_BST_Test extends TestCase
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
        $tree = [10,5,15,3,7,null,18];
        $L = 7;
        $R = 15;
        $root = $this->buildTree($tree);
        $response = $this->solution->rangeSumBST($root, $L, $R);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(32, $response);
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
     * @param TreeNode $root
     * @param Integer $L
     * @param Integer $R
     * @return Integer
     */
    function rangeSumBST($root, $L, $R)
    {
        $left_sum = $right_sum = 0;
        if (null !== $root->left){
            if ($root->val > $L && $L > ) {
                $left_sum = $this->rangeSumBST($root->left, $L, $R);
            } else {

            }
        }
        if (null !== $root->right) {
            if ($root->left->val < $L) {
                $right_sum = $this->rangeSumBST($root->right, $L, $R);
            }
        }
        return $root->val + $left_sum + $right_sum;
    }
}