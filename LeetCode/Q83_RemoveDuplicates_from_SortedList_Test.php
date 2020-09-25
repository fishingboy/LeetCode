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

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function testExample1()
    {
        $nums = [1,1,2,3,3];
        $head = $this->arrayToListNode($nums);
        $response = $this->solution->deleteDuplicates($head);
        $array = $this->listNodeToArray($response);
        $this->assertArraySubset([1,2,3], $array);
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
        $curr = $head;
        while ($curr) {


            $curr = $curr->next;
        }
    }
}