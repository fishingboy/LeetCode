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

    public function testSample2()
    {
        $tree = [1,2,2,null,3,null,3];
        $root = $this->buildTree($tree);
        $response = $this->solution->isSymmetric($root);
        $this->assertFalse($response);
    }

    public function test_wa1()
    {
        $tree = [1,0];
        $root = $this->buildTree($tree);
        $response = $this->solution->isSymmetric($root);
        $this->assertFalse($response);
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
        $node_queue[] = $root;
        while (count($node_queue)) {

            // 取出同層的值
            $level_nums = [];
            $next_queue = [];
            while ($node = array_shift($node_queue)) {
                $level_nums[] = $node->left->val ?? null;
                $level_nums[] = $node->right->val ?? null;

                if ($node->left !== null) {
                    $next_queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $next_queue[] = $node->right;
                }
            }

            // 判斷有沒有對稱
            while (count($level_nums)) {
                $head = array_shift($level_nums);
                $foot = array_pop($level_nums);
                if ($head !== $foot) {
                    return false;
                }
            }

            // 往下一層走訪
            $node_queue = $next_queue;
        }
        return true;
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
