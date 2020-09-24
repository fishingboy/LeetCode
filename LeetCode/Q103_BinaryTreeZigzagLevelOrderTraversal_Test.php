<?php
namespace LeetCode\Q103;
use Library\TreeBuilder;
use Library\TreeNode;
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

    public function test_3()
    {
        $tree = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31];
        $root = $this->buildTree($tree);
        $response = $this->solution->zigzagLevelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset([
            [1],
            [3,2],
            [4,5,6,7],
            [15,14,13,12,11,10,9,8],
            [16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31]
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
            echo $way;

            // 取出同層的值
            $level_nums = [];
            $next_queue = [];
            while ($node = array_pop($node_queue)) {
                if ($way) {
                    if ($node->left && $node->left->val !== null) {
                        $level_nums[] = $node->left->val;
                        $next_queue[] = $node->left;
                    }
                    if ($node->right && $node->right->val !== null) {
                        $level_nums[] = $node->right->val;
                        $next_queue[] = $node->right;
                    }
                } else {
                    if ($node->right && $node->right->val !== null) {
                        $level_nums[] = $node->right->val;
                        $next_queue[] = $node->right;
                    }
                    if ($node->left && $node->left->val !== null) {
                        $level_nums[] = $node->left->val;
                        $next_queue[] = $node->left;
                    }
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


/**
 * Next challenges:
 * https://leetcode.com/problems/course-schedule-ii/
 * https://leetcode.com/problems/binary-tree-longest-consecutive-sequence-ii/
 * https://leetcode.com/problems/escape-a-large-maze/
 */