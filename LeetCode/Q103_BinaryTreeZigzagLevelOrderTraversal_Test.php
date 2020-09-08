<?php
namespace LeetCode\Q103;
use PHPUnit\Framework\TestCase;

class Q103_BinaryTreeZigzagLevelOrderTraversal_Test extends TestCase
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
        $tree = [3,9,20,null,null,15,7];
        $root = $this->buildTree($tree);
        $response = $this->solution->zigzagLevelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([
            [3],
            [20,9],
            [15,7]
        ], $response);
    }

    public function test_1()
    {
        $tree = [1,2,3];
        $root = $this->buildTree($tree);
        $response = $this->solution->zigzagLevelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([
            [1],
            [3,2],
        ], $response);
    }

    public function test_2()
    {
        $tree = [1,2];
        $root = $this->buildTree($tree);
        $response = $this->solution->zigzagLevelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([
            [1],
            [2],
        ], $response);
    }

    public function test_wa1()
    {
        $tree = [0,-4,-3,null,-1,8,null,null,3,null,-9,-2,null,4];
        $root = $this->buildTree($tree);
        $response = $this->solution->zigzagLevelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([[0],[-3,-4],[-1,8],[-9,3],[-2,4]], $response);
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
     * @return Integer[][]
     */
    function zigzagLevelOrder($root)
    {
        if ( ! $root) {
            return [];
        }

        // 方向: 0 左到右 1 右到左
        $way = 0;

        $answer = [
            [$root->val]
        ];
        $node_queue[] = $root;
        while (count($node_queue)) {
            // 取出同層的值
            $level_nums = [];
            $next_queue = [];
            while ($node = ($way) ? array_shift($node_queue) : array_pop($node_queue)) {
                if ($way) {
                    if ($node->left && $node->left->val !== null) {
                        $level_nums[] = $node->left->val;
                    }
                    if ($node->right && $node->right->val !== null) {
                        $level_nums[] = $node->right->val;
                    }
                } else {
                    if ($node->right && $node->right->val !== null) {
                        $level_nums[] = $node->right->val;
                    }
                    if ($node->left && $node->left->val !== null) {
                        $level_nums[] = $node->left->val;
                    }
                }

                if ($node->left !== null) {
                    $next_queue[] = $node->left;
                }
                if ($node->right !== null) {
                    $next_queue[] = $node->right;
                }
            }

            if (count($level_nums)) {
                $answer[] = $level_nums;

                // 往下一層走訪
                $node_queue = $next_queue;
            }

            // 換方向
            $way = ($way + 1) % 2;
        }
        return $answer;
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

/**
 * Next challenges:
 * https://leetcode.com/problems/course-schedule-ii/
 * https://leetcode.com/problems/binary-tree-longest-consecutive-sequence-ii/
 * https://leetcode.com/problems/escape-a-large-maze/
 */