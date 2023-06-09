<?php

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
            $curr = $curr->next;
        }
        return $curr->val;
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
            $before = $curr;
            $curr = $curr->next;
        }
        $before->next = new Node($val);
        $before->next->next = $curr;
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
            $before = $curr;
            $curr = $curr->next;
        }
        $before->next = $curr->next;
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