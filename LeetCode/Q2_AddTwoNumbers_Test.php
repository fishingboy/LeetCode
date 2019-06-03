<?php

use PHPUnit\Framework\TestCase;

class Q2_AddTwoNumbers_Test extends TestCase
{
    public function testGetInt()
    {
        $solution = new Solution();
        $l3 = new ListNode(3);
        $l2 = new ListNode(4);
        $l1 = new ListNode(2);
        $l1->next = $l2;
        $l2->next = $l3;

        $val = $solution->getInt($l1);
        $this->assertEquals(342, $val);
    }

    public function testToListNode()
    {
        $solution = new Solution();
        $n = 342;
        $node = $solution->toListNode($n);
        $val = $solution->getInt($node);
        $this->assertEquals(342, $val);
    }

    public function testSample()
    {
        // Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)
        // Output: 7 -> 0 -> 8
        // Explanation: 342 + 465 = 807.
        $solution = new Solution();
        $n1 = 342;
        $n2 = 465;

        $node1 = $solution->toListNode($n1);
        $node2 = $solution->toListNode($n2);

        $response = $solution->addTwoNumbers($node1, $node2);
        $this->assertEquals(807, $solution->getInt($response));
    }

    public function testSample2()
    {
        // Input
        // [1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1]
        // [5,6,4]
        // Output
        // [8,1,0,0,8,4,5,8,6,3,0,2,7,3,3,2,2,0,9]
        // Expected
        // [6,6,4,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1]
        $solution = new Solution();
        $n1 = 1000000000000000000000000000001;
        $n2 = 465;

        $node1 = $solution->toListNode($n1);
        $node2 = $solution->toListNode($n2);

        $response = $solution->addTwoNumbers($node1, $node2);
        $this->assertEquals(1000000000000000000000000000466, $solution->getInt($response));
    }
}

class ListNode
{
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
}

class Solution
{
    /**
     * 兩個串列相加
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $n1 = $this->getInt($l1);
        $n2 = $this->getInt($l2);
        $sum = $n1 + $n2;
        return $this->toListNode($sum);
    }

    /**
     * 串列轉成數字
     * @param ListNode $list_node
     * @return int
     */
    public function getInt(ListNode $list_node)
    {
        $tmp = [];
        $node = $list_node;
        while ($node) {
            $tmp[] = $node->val;
            $node = $node->next;
        }
        $tmp = array_reverse($tmp);
        return intval(implode("", $tmp));
    }

    /**
     * 數字轉成串列
     * @param int $number
     * @return ListNode
     */
    public function toListNode($number)
    {
        $str = "$number";
        $n = strlen($str);
        $next = null;
        for ($i = 0; $i < $n; $i++) {
            $v = intval($str[$i]);
            $node = new ListNode($v);
            $node->next = $next;
            $next = $node;
        }
        return $node;
    }
}