<?php

namespace Library;
use Library\ListNode;

class ListBuilder
{
    /**
     * @var ListNode
     */
    private $head;

    public function __construct($nums)
    {
        $this->arrayToListNode($nums);
    }
    /**
     * 數字轉成串列
     * @param $nums
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
        $this->head = $node;
    }

    /**
     * @return ListNode
     */
    public function getHead()
    {
        return $this->head;
    }
}