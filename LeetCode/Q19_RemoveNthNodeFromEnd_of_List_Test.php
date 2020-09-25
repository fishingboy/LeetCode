<?php
namespace LeetCode\Q19;
use Library\ListBuilder;
use Library\ListNode;
use PHPUnit\Framework\TestCase;

class Q19_RemoveNthNodeFromEnd_of_List_Test extends TestCase
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
        $nums = [1,2,3,4,5];
        $head = $this->arrayToListNode($nums);
        $n = 2;
        $response = $this->solution->removeNthFromEnd($head, $n);
        $array = $this->listNodeToArray($response);
        $this->assertArraySubset([1,2,3,5], $array);
    }

    public function test_1()
    {
        $nums = [1];
        $head = $this->arrayToListNode($nums);
        $n = 1;
        $response = $this->solution->removeNthFromEnd($head, $n);
        $array = $this->listNodeToArray($response);
        $this->assertArraySubset([], $array);
    }

    public function test_2()
    {
        $nums = [1,2];
        $head = $this->arrayToListNode($nums);
        $n = 1;
        $response = $this->solution->removeNthFromEnd($head, $n);
        $array = $this->listNodeToArray($response);
        $this->assertArraySubset([1], $array);
    }

    public function test_wa1()
    {
        $nums = [1,2];
        $head = $this->arrayToListNode($nums);
        $n = 2;
        $response = $this->solution->removeNthFromEnd($head, $n);
        $array = $this->listNodeToArray($response);
        $this->assertArraySubset([2], $array);
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
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n)
    {
        $curr = $head;
        $i = 0;
        $break_node = null;
        while ($curr) {
            if ($i >= $n) {
                if (null === $break_node) {
                    $break_node = $head;
                } else {
                    $break_node = $break_node->next;
                }
            }
            $i++;
            $curr = $curr->next;
        }

        if (null === $break_node) {
            return null;
        }

        $break_node->next = $break_node->next->next ?? null;

        return $head;
    }
}