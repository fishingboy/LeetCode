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

        $linkList->print();

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


        $linkList->print();

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
//        $linkList->addAtHead(1);
//        $val = $linkList->get(0);
//        $this->assertEquals(1, $val);
//        $linkList->addAtIndex(0, 2);
//        $val = $linkList->get(0);
//        $this->assertEquals(2, $val);
//        $val = $linkList->get(1);
//        $this->assertEquals(1, $val);
    }

//    public function test2()
//    {
//        $linkList = new MyLinkedList();
//        $linkList->addAtHead(1);
//        $linkList->addAtTail(2);
//        $linkList->addAtIndex(2,3);
//        $linkList->addAtIndex(4,31);
//        $linkList->addAtIndex(4,333);
//        $linkList->deleteAtIndex(10);
//        $linkList->print();
//    }


    public function testSample1()
    {
        $actions = ["MyLinkedList","addAtHead","addAtTail","addAtIndex","get","deleteAtIndex","get"];
        $params = [[],[1],[3],[1,2],[1],[1],[1]];
        $response = $this->action($actions, $params);
        echo "<pre>response = " . json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "</pre>\n";
//        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
//        var_dump($response);
        $this->assertEquals([null,null,null,null,2,null,3], $response);
    }

    public function testSample2()
    {
        $actions = ["MyLinkedList","addAtHead","addAtTail","addAtTail","get","get","addAtTail","addAtIndex","addAtHead","addAtHead","addAtTail","addAtTail","addAtTail","addAtTail","get","addAtHead","addAtHead","addAtIndex","addAtIndex","addAtHead","addAtTail","deleteAtIndex","addAtHead","addAtHead","addAtIndex","addAtTail","get","addAtIndex","addAtTail","addAtHead","addAtHead","addAtIndex","addAtTail","addAtHead","addAtHead","get","deleteAtIndex","addAtTail","addAtTail","addAtHead","addAtTail","get","deleteAtIndex","addAtTail","addAtHead","addAtTail","deleteAtIndex","addAtTail","deleteAtIndex","addAtIndex","deleteAtIndex","addAtTail","addAtHead","addAtIndex","addAtHead","addAtHead","get","addAtHead","get","addAtHead","deleteAtIndex","get","addAtHead","addAtTail","get","addAtHead","get","addAtTail","get","addAtTail","addAtHead","addAtIndex","addAtIndex","addAtHead","addAtHead","deleteAtIndex","get","addAtHead","addAtIndex","addAtTail","get","addAtIndex","get","addAtIndex","get","addAtIndex","addAtIndex","addAtHead","addAtHead","addAtTail","addAtIndex","get","addAtHead","addAtTail","addAtTail","addAtHead","get","addAtTail","addAtHead","addAtTail","get","addAtIndex"];
        $params = [[],[84],[2],[39],[3],[1],[42],[1,80],[14],[1],[53],[98],[19],[12],[2],[16],[33],[4,17],[6,8],[37],[43],[11],[80],[31],[13,23],[17],[4],[10,0],[21],[73],[22],[24,37],[14],[97],[8],[6],[17],[50],[28],[76],[79],[18],[30],[5],[9],[83],[3],[40],[26],[20,90],[30],[40],[56],[15,23],[51],[21],[26],[83],[30],[12],[8],[4],[20],[45],[10],[56],[18],[33],[2],[70],[57],[31,24],[16,92],[40],[23],[26],[1],[92],[3,78],[42],[18],[39,9],[13],[33,17],[51],[18,95],[18,33],[80],[21],[7],[17,46],[33],[60],[26],[4],[9],[45],[38],[95],[78],[54],[42,86]];
        $response = $this->action($actions, $params);
        echo "<pre>response = " . json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "</pre>\n";
//        echo "<pre>response = " . print_r($response, true) . "</pre>\n";
        $this->assertEquals([null, null, null, null, -1, 2, null, null, null, null, null, null, null, null, 84, null, null, null, null, null, null, null, null, null, null, null, 16, null, null, null, null, null, null, null, null, 37, null, null, null, null, null, 23, null, null, null, null, null, null, null, null, null, null, null, null, null, null, 19, null, 17, null, null, 56, null, null, 31, null, 17, null, 12, null, null, null, null, null, null, null, 40, null, null, null, 37, null, 76, null, 42, null, null, null, null, null, null, 80, null, null, null, null, 43, null, null, null, 40, null], $response);
    }

    private function action($actions, $params)
    {
        $linkedList = null;
        $output = [];
        foreach ($actions as $i => $action){
            echo "<pre>$i. action = " . print_r($action, true) . "  " .print_r($params[$i], true) . "</pre>\n";
            switch ($action) {
                case "MyLinkedList":
                    $output[] = null;
                    $linkedList = new MyLinkedList();
                    break;

                case "addAtHead":
                    $output[] = $linkedList->addAtHead($params[$i][0]);
                    break;

                case "addAtTail":
                    $output[] = $linkedList->addAtTail($params[$i][0]);
                    break;

                case "addAtIndex":
                    $output[] = $linkedList->addAtIndex($params[$i][0], $params[$i][1]);
                    break;

                case "get":
                    $output[] = $linkedList->get($params[$i][0]);
                    break;

                case "deleteAtIndex":
                    $output[] = $linkedList->deleteAtIndex($params[$i][0]);
                    break;
            }
        }
        $linkedList->print();
        return $output;
    }
}


class Node {
    public $val;
    public $next = null;
    public $hash;
    public function __construct($number) {
        $this->val = $number;
        $this->hash = md5(rand(0,999999) . time());
    }
}


class MyLinkedList {
    private $head = null;
    private $count = 0;

    /**
     */
    function __construct() {

    }

    /**
     * @param Integer $index
     * @return Integer
     */
    function get($index) {
        if ($index >= $this->count) {
            return -1;
        }

        $curr = $this->head;
        for ($i=0; $i<$index; $i++) {
            $curr = $curr->next;
        }

        return $curr->val;
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function addAtHead($val) {
        $this->count++;

        $before_head = $this->head;
        $this->head = new Node($val);
        $this->head->next = $before_head;
    }

    /**
     * @param Integer $val
     * @return NULL
     */
    function addAtTail($val) {
        $this->count++;

        if (!$this->head) {
            $this->head = new Node($val);
            return;
        }

        $curr = $this->head;
        while ($curr->next) {
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
        if ($index > $this->count) {
            return;
        }

        if ($index == 0) {
            $this->addAtHead($val);
            return;
        }

        $this->count++;

        $before = $this->head;
        $curr = $before->next;
        for ($i=1; $i<$index; $i++) {
            $before = $curr;
            $curr = $before->next;
        }

        $node = new Node($val);
        $before->next = $node;
        $node->next = $curr;

    }

    /**
     * @param Integer $index
     * @return NULL
     */
    function deleteAtIndex($index) {
        if ($index >= $this->count) {
            return;
        }

        if ($index == 0) {
            $this->head = $this->head->next;
            $this->count--;
            return;
        }

        $this->count--;

        $before = $this->head;
        $curr = $before->next;
        for ($i=1; $i<$index; $i++) {
            $before = $curr;
            $curr = $before->next;
        }

        $before->next = $curr->next;
    }

    public function print()
    {
        echo "===  count : {$this->count}  ===\n";
        $curr = $this->head;
        $i = 0;
        echo $i++ . ". {$curr->val} ($curr->hash) \n";
        while ($curr->next) {
            $curr = $curr->next;
            echo $i++ . ". {$curr->val} ($curr->hash) \n";
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