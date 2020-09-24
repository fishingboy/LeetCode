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
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertArraySubset(["ad", "ae", "af", "bd", "be", "bf", "cd", "ce", "cf"], $response);
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
        $total = 1;
        while ($curr->next) {
            $total++;
        }

        $pos = $total - $n + 1;
        while ($curr->next) {
            $total++;
        }

        return $head;
    }
}