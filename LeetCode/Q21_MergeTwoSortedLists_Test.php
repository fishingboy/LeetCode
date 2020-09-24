<?php
namespace LeetCode\Q21;
use Library\ListNode;
use PHPUnit\Framework\TestCase;

class Q21_MergeTwoSortedLists_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function test_toListNode()
    {
        $l1 = $this->arrayToListNode([1, 2, 3]);
        $this->assertIsObject($l1);
        $node = $l1->next;
        $this->assertIsObject($node);
        $node = $node->next;
        $this->assertIsObject($node);
        $node = $node->next;
        $this->assertNull($node);

        $array = $this->listNodeToArray($l1);
        $this->assertArraySubset([1,2,3], $array);
    }
    
    public function testExample()
    {
        $l1 = $this->arrayToListNode( [1, 2, 4]);
        $l2 = $this->arrayToListNode( [1, 3, 4]);
        $response = $this->solution->mergeTwoLists($l1, $l2);
        $this->assertIsObject($response);

        $array = $this->listNodeToArray($response);
        $this->assertArraySubset([1, 1, 2, 3, 4, 4], $array);
    }

    public function testExample2()
    {
        $l1 = $this->arrayToListNode( []);
        $l2 = $this->arrayToListNode( [1]);
        $response = $this->solution->mergeTwoLists($l1, $l2);
        $this->assertIsObject($response);

        $array = $this->listNodeToArray($response);
        $this->assertArraySubset([1], $array);
    }

    public function testExample3()
    {
        $l1 = $this->arrayToListNode( [-10,-4,-4,0,0,1,4,6]);
        $l2 = $this->arrayToListNode( []);
        $response = $this->solution->mergeTwoLists($l1, $l2);
        $this->assertIsObject($response);

        $array = $this->listNodeToArray($response);
        $this->assertArraySubset([-10,-4,-4,0,0,1,4,6], $array);
    }

    /**
     * 數字轉成串列
     * @param $nums
     * @return ListNode
     */
    private function arrayToListNode($nums)
    {
        $nums = array_reverse($nums);
        $node = $next = null;
        foreach ($nums as $num) {
            $node = new ListNode($num);
            $node->next = $next;
            $next = $node;
        }
        return $node;
    }

    /**
     * 數字轉成串列
     * @param ListNode $node
     * @return array
     */
    private function listNodeToArray($node)
    {
        $result = [];
        while($node)
        {
            $result[] = $node->val;
            $node = $node->next;
        }
        return $result;
    }
}

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        $first_node = $pre_node = null;
        while ($l1 || $l2) {
            $l1_value = $l1->val ?? null;
            $l2_value = $l2->val ?? null;

            $value = 0;
            if ($l1_value === null && isset($l2_value)) {
                $value = $l2_value;
                $l2 = $l2->next ?? null;
            } else if (isset($l1_value) && $l2_value === null ) {
                $value = $l1_value;
                $l1 = $l1->next ?? null;
            } else if ($l1_value < $l2_value) {
                $value = $l1_value;
                $l1 = $l1->next ?? null;
            } else if ($l2_value <= $l1_value) {
                $value = $l2_value;
                $l2 = $l2->next ?? null;
            }

            $node = new ListNode($value);
            if ( ! $first_node) {
                $first_node = $node;
            } else {
                $pre_node->next = $node;
            }
            $pre_node = $node;
        }
        return $first_node;
    }
}