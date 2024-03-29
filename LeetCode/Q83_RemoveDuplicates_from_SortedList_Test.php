<?php
namespace LeetCode\Q83;
use Library\ListBuilder;
use Library\ListNode;
use PHPUnit\Framework\TestCase;

class Q83_RemoveDuplicates_from_SortedList_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testExample1()
    {
        $nums = [1,1,2,3,3];
        $head = $this->arrayToListNode($nums);
        $response = $this->solution->deleteDuplicates($head);
        $array = $this->listNodeToArray($response);
        $this->assertEquals([1,2,3], $array);
    }

    public function test_1()
    {
        $nums = [3,3,3,3,3];
        $head = $this->arrayToListNode($nums);
        $response = $this->solution->deleteDuplicates($head);
        $array = $this->listNodeToArray($response);
        $this->assertEquals([3], $array);
    }

    public function test_WA1()
    {
        $nums = [0,0,0,0,0];
        $head = $this->arrayToListNode($nums);
        $response = $this->solution->deleteDuplicates($head);
        $array = $this->listNodeToArray($response);
        $this->assertEquals([0], $array);
    }

    /**
     * 數字轉成串列
     * @param $nums
     * @return ListNode
     */
    private function arrayToListNode($nums)
    {
        $builder = new ListBuilder($nums);
        return $builder->getHead();
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
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{
    /**
     * @param ListNode $head
     * @return ListNode
     */
    function deleteDuplicates($head)
    {
        $prev = null;
        $prev_node = null;
        $curr = $head;
        while ($curr) {
            if ($curr->val === $prev) {
                $prev_node->next = $curr->next;
            } else {
                $prev_node = $curr;
            }

            $prev = $curr->val;
            $curr = $curr->next;
        }
        return $head;
    }
}