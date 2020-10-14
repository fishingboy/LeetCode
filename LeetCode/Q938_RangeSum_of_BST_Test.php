<?php
namespace LeetCode\Q938;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

/**
 * @todo
 */
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
        $sum = 0;
        $stack = [$root];
        while (count($stack)) {
            $node = array_pop($stack);

            if ($node->val >= $L && $node->val <= $R) {
                $sum += $node->val;
            }

            if ($node->left && $node->val > $L) {
                array_push($stack, $node->left);
            }
            if ($node->right && $node->val < $R) {
                array_push($stack, $node->right);
            }
        }
        return $sum;
    }
}