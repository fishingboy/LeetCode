<?php

use LeetCode\Q1\Solution;
use PHPUnit\Framework\TestCase;

class Q01_DesignLinkedList_Test extends TestCase
{
    public function testConstruct()
    {
        $linkList = new MyLinkedList();
        $this->assertTrue(true);
    }

    public function testAddHead()
    {
        $linkList = new MyLinkedList();
        $linkList->addAtHead(1);
        $val = $linkList->get(0);
        echo "<pre>val = " . print_r($val, true) . "</pre>\n";
        $this->assertEquals(1, $val);
    }

    public function testAddAtTail1()
    {
        $linkList = new MyLinkedList();
        $linkList->addAtTail(1);
        $linkList->addAtTail(2);
        $linkList->addAtTail(3);

        $val = $linkList->get(0);
        $this->assertEquals(1, $val);
        $val = $linkList->get(1);
        $this->assertEquals(2, $val);
        $val = $linkList->get(2);
        $this->assertEquals(3, $val);
    }

    public function testAddAtTail2()
    {
        $linkList = new MyLinkedList();
        $linkList->addAtTail(1);
        $linkList->addAtTail(2);
        $linkList->addAtTail(3);
        $linkList->addAtHead(4);

        $val = $linkList->get(0);
        $this->assertEquals(4, $val);
        $val = $linkList->get(1);
        $this->assertEquals(1, $val);
        $val = $linkList->get(2);
        $this->assertEquals(2, $val);
        $val = $linkList->get(3);
        $this->assertEquals(3, $val);
    }

    public function testAddIndex()
    {
        $linkList = new MyLinkedList();
        $linkList->addAtIndex(0, 1);
        $linkList->addAtIndex(1, 2);
        $linkList->addAtIndex(1, 3);
        $linkList->addAtIndex(1, 4);

        $val = $linkList->get(0);
        $this->assertEquals(1, $val);
        $val = $linkList->get(1);
        $this->assertEquals(4, $val);
        $val = $linkList->get(2);
        $this->assertEquals(3, $val);
        $val = $linkList->get(3);
        $this->assertEquals(2, $val);
    }

    public function test1()
    {
        $linkList = new MyLinkedList();
        $linkList->addAtHead(1);
        $linkList->addAtTail(2);
        $linkList->deleteAtIndex(0);
        $linkList->deleteAtIndex(0);
        $val = $linkList->get(0);
        $this->assertEquals(-1, $val);
        $linkList->addAtHead(1);
        $val = $linkList->get(0);
        $this->assertEquals(1, $val);
        $linkList->addAtIndex(0, 2);
        $val = $linkList->get(0);
        $this->assertEquals(2, $val);
        $val = $linkList->get(1);
        $this->assertEquals(1, $val);
    }

    public function testSample1()
    {
        $actions = ["MyLinkedList","addAtHead","addAtTail","addAtIndex","get","deleteAtIndex","get"];
        $params = [[],[1],[3],[1,2],[1],[1],[1]];
        $response = $this->action($actions, $params);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
//        $this->assertEquals([0, 1], $response);
    }

    public function testSample2()
    {
        $actions = ["MyLinkedList","addAtHead","addAtTail","addAtTail","get","get","addAtTail","addAtIndex","addAtHead","addAtHead","addAtTail","addAtTail","addAtTail","addAtTail","get","addAtHead","addAtHead","addAtIndex","addAtIndex","addAtHead","addAtTail","deleteAtIndex","addAtHead","addAtHead","addAtIndex","addAtTail","get","addAtIndex","addAtTail","addAtHead","addAtHead","addAtIndex","addAtTail","addAtHead","addAtHead","get","deleteAtIndex","addAtTail","addAtTail","addAtHead","addAtTail","get","deleteAtIndex","addAtTail","addAtHead","addAtTail","deleteAtIndex","addAtTail","deleteAtIndex","addAtIndex","deleteAtIndex","addAtTail","addAtHead","addAtIndex","addAtHead","addAtHead","get","addAtHead","get","addAtHead","deleteAtIndex","get","addAtHead","addAtTail","get","addAtHead","get","addAtTail","get","addAtTail","addAtHead","addAtIndex","addAtIndex","addAtHead","addAtHead","deleteAtIndex","get","addAtHead","addAtIndex","addAtTail","get","addAtIndex","get","addAtIndex","get","addAtIndex","addAtIndex","addAtHead","addAtHead","addAtTail","addAtIndex","get","addAtHead","addAtTail","addAtTail","addAtHead","get","addAtTail","addAtHead","addAtTail","get","addAtIndex"];
        $params = [[],[84],[2],[39],[3],[1],[42],[1,80],[14],[1],[53],[98],[19],[12],[2],[16],[33],[4,17],[6,8],[37],[43],[11],[80],[31],[13,23],[17],[4],[10,0],[21],[73],[22],[24,37],[14],[97],[8],[6],[17],[50],[28],[76],[79],[18],[30],[5],[9],[83],[3],[40],[26],[20,90],[30],[40],[56],[15,23],[51],[21],[26],[83],[30],[12],[8],[4],[20],[45],[10],[56],[18],[33],[2],[70],[57],[31,24],[16,92],[40],[23],[26],[1],[92],[3,78],[42],[18],[39,9],[13],[33,17],[51],[18,95],[18,33],[80],[21],[7],[17,46],[33],[60],[26],[4],[9],[45],[38],[95],[78],[54],[42,86]];
        $response = $this->action($actions, $params);
        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
//        $this->assertEquals([0, 1], $response);
    }

    private function action($actions, $params)
    {
        $linkedList = null;
        $output = [];
        foreach ($actions as $i => $action){
            echo "<pre>action = " . print_r($action, true) . "  " .print_r($params[$i], true) . "</pre>\n";
            switch ($action) {
                case "MyLinkedList":
                    $output[] = null;
                    $linkedList = new MyLinkedList();
                    break;

                case "addAtHead":
                    $output[] = $linkedList->addAtHead($params[0]);
                    break;

                case "addAtTail":
                    $output[] = $linkedList->addAtTail($params[0]);
                    break;

                case "addAtIndex":
                    $output[] = $linkedList->addAtIndex($params[0], $params[1]);
                    break;

                case "get":
                    $output[] = $linkedList->get($params[0]);
                    break;

                case "deleteAtIndex":
                    $output[] = $linkedList->deleteAtIndex($params[0]);
                    break;
            }
        }
        return $output;
    }
}


class Node {
    public $val;
    public $next = null;
    public function __construct($number) {
        $this->val = $number;
    }
}

class MyLinkedList {
    private $head = null;

    /**
     */
    function __construct() {

    }

    /**
     * @param Integer $index
     * @return Integer
     */
    function get($index) {
        $curr = $this->head;
        for ($i=0; $i<$index; $i++) {
            if ($curr === null) {
                return -1;
            }
            $curr = $curr->next;
        }
        return $curr->val ?? -1;
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function addAtHead($val) {
        $before_head = $this->head;
        $this->head = new Node($val);
        $this->head->next = $before_head;
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function addAtTail($val) {
        if ($this->head === null) {
            $this->head = new Node($val);
            return;
        }

        $curr = $this->head;
        while ($curr->next !== null) {
            $curr = $curr->next;
        }
        $curr->next = new Node($val);
    }

    /**
     * @param Integer $index
     * @param Integer $val
     * @return NULL
     */
    function addAtIndex($index, $val) {
        if ($index == 0) {
            $this->addAtHead($val);
            return;
        }

        $before = null;
        $curr = $this->head;
        for ($i=0; $i<$index; $i++) {
            if ($curr === null) {
                break;
            }
            $before = $curr;
            $curr = $curr->next;
        }
        if ($index == $i) {
            $before->next = new Node($val);
            $before->next->next = $curr;
        }
    }

    /**
     * @param Integer $index
     * @return NULL
     */
    function deleteAtIndex($index) {
        if ($index == 0) {
            $this->head = $this->head->next;
            return;
        }

        $before = null;
        $curr = $this->head;
        for ($i=0; $i<$index; $i++) {
            if ($curr === null) {
                return;
            }
            $before = $curr;
            $curr = $curr->next;
        }

        if ($curr->next) {
            $before->next = $curr->next;
        }
    }
}

/**
 * Your MyLinkedList object will be instantiated and called as such:
 * $obj = MyLinkedList();
 * $ret_1 = $obj->get($index);
 * $obj->addAtHead($val);
 * $obj->addAtTail($val);
 * $obj->addAtIndex($index, $val);
 * $obj->deleteAtIndex($index);
 */