<?php
namespace LeetCode\Q700;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q700_Search_in_a_BinarySearchTree_Test extends TestCase
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
        $tree = [4,2,7,1,3];
        $root = $this->buildTree($tree);
        $response = $this->solution->searchBST($root, 2);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(2, $response->val);
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
     * @param Integer $val
     * @return TreeNode
     */
    function searchBST($root, $val)
    {
        $node = $root;
        while ($node) {
            if ($node->val == $val) {
                return $node;
            } else if ($node->val > $val) {
                $node = $node->left;
            } else {
                $node = $node->right;
            }
        }
        return null;
    }
}

/**
 * Next challenges:
 * Easy   https://leetcode.com/problems/closest-binary-search-tree-value/
 * Medium https://leetcode.com/problems/insert-into-a-binary-search-tree/
 */