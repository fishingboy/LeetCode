<?php
namespace LeetCode\Q102;
use Library\TreeBuilder;
use Library\TreeNode;
use PHPUnit\Framework\TestCase;

class Q102_BinaryTreeLevelOrderTraversal_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testSample1()
    {
        $tree = [3,9,20,null,null,15,7];
        $root = $this->buildTree($tree);
        $response = $this->solution->levelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([
            [3],
            [9,20],
            [15,7]
        ], $response);
    }

    public function test_1()
    {
        $tree = [1,2,3];
        $root = $this->buildTree($tree);
        $response = $this->solution->levelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([
            [1],
            [2,3],
        ], $response);
    }

    public function test_2()
    {
        $tree = [1,2];
        $root = $this->buildTree($tree);
        $response = $this->solution->levelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([
            [1],
            [2],
        ], $response);
    }

    public function test_wa1()
    {
        $tree = [];
        $root = $this->buildTree($tree);
        $response = $this->solution->levelOrder($root);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([
        ], $response);
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
    function levelOrder($root)
    {
        if ( ! $root) {
            return [];
        }

        $answer = [
            [$root->val]
        ];
        $node_queue[] = $root;
        while (count($node_queue)) {

            // 取出同層的值
            $level_nums = [];
            $next_queue = [];
            while ($node = array_shift($node_queue)) {
                if ($node->left && $node->left->val !== null) {
                    $level_nums[] = $node->left->val;
                }
                if ($node->right && $node->right->val !== null) {
                    $level_nums[] = $node->right->val;
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