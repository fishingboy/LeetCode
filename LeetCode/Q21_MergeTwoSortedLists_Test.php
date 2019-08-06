<?php
namespace LeetCode\Q21;
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
    }
    
//    public function testExample()
//    {
//        $response = $this->solution->mergeTwoLists($l1, $l2);
//        $this->assertFalse($response);
//    }

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
     * @param string $number
     * @return ListNode
     */
    private function ListNodeToArray($nums)
    {
        $n = strlen($number);
        $next = null;
        for ($i = 0; $i < $n; $i++) {
            $v = intval($number[$i]);
            $node = new ListNode($v);
            $node->next = $next;
            $next = $node;
        }
        return $node;
    }
}

class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
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

    }
}