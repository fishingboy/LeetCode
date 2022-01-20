<?php
namespace LeetCode\Q2;
use Library\ListNode;
use PHPUnit\Framework\TestCase;

/**
 * @tag 樹
 */
class Q2_AddTwoNumbers_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp() : void
    {
        $this->solution = new Solution();
    }

    public function testGetInt()
    {
        $l3 = new ListNode(3);
        $l2 = new ListNode(4);
        $l1 = new ListNode(2);
        $l1->next = $l2;
        $l2->next = $l3;

        $val = $this->solution->getInt($l1);
        $this->assertEquals("342", $val);
    }

    public function testToListNode()
    {
        $n = "342";
        $node = $this->solution->toListNode($n);
        $val = $this->solution->getInt($node);
        $this->assertEquals("342", $val);
    }

    public function testSample()
    {
        // Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)
        // Output: 7 -> 0 -> 8
        // Explanation: 342 + 465 = 807.
        $n1 = "342";
        $n2 = "465";

        $node1 = $this->solution->toListNode($n1);
        $node2 = $this->solution->toListNode($n2);

        $response = $this->solution->addTwoNumbers($node1, $node2);
        $this->assertEquals("807", $this->solution->getInt($response));
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
        $n1 = "1000000000000000000000000000001";
        $n2 = "465";

        $node1 = $this->solution->toListNode($n1);
        $node2 = $this->solution->toListNode($n2);

        $response = $this->solution->addTwoNumbers($node1, $node2);
        $this->assertEquals("1000000000000000000000000000466", $this->solution->getInt($response));
    }

    public function testSample3()
    {
        // Input
        // [5]
        // [5]
        // Output
        // [0]
        // Expected
        // [0,1]
        $n1 = "5";
        $n2 = "5";

        $node1 = $this->solution->toListNode($n1);
        $node2 = $this->solution->toListNode($n2);

        $response = $this->solution->addTwoNumbers($node1, $node2);
        $this->assertEquals("10", $this->solution->getInt($response));
    }
}


class Solution
{
    /**
     * 兩個串列相加
     * @param ListNode $node1
     * @param ListNode $node2
     * @return ListNode
     */
    function addTwoNumbers($node1, $node2)
    {
        $d = 0;
        $node = null;
        $next = null;

        $nodes = [];
        while ($node1 || $node2) {
            $val1 = $node1->val ?? 0;
            $val2 = $node2->val ?? 0;

            // 加總
            $sum = $val1 + $val2 + $d;

            // 進位
            $d = $sum >= 10 ? 1 : 0;

            // 儲存答案
            $nodes[] = new ListNode($sum % 10);

            // 往上一個位數
            $node1 = $node1->next ?? null;
            $node2 = $node2->next ?? null;
        }

        // 如果還有進位的話
        if ($d > 0) {
            $nodes[] = new ListNode($d);
        }

        // 串起來
        foreach ($nodes as $i => $node) {
            if (isset($nodes[$i + 1])) {
                $node->next = $nodes[$i + 1];
            }
        }

        return $nodes[0];
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
        return implode("", $tmp);
    }

    /**
     * 數字轉成串列
     * @param string $number
     * @return ListNode
     */
    public function toListNode($number)
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