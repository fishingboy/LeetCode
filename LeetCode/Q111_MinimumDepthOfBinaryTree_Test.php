<?php
namespace LeetCode\Q111;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q111_MinimumDepthOfBinaryTree_Test extends TestCase
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
        $response = $this->solution->minDepth($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(2, $response);
    }

    public function testSample2()
    {
        $tree = [2,null,3,null,4,null,5,null,6];
        $root = $this->buildTree($tree);
        $response = $this->solution->minDepth($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals(5, $response);
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
    function minDepth($root): int
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
                if ($node->left === null && $node->right === null) {
                    return $depth;
                }

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