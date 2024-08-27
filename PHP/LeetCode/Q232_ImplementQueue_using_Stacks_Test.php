<?php
namespace LeetCode\Q232;
use PHPUnit\Framework\TestCase;

class Q232_ImplementQueue_using_Stacks_Test extends TestCase
{
    public function setUp() : void
    {
    }

    public function testSample1()
    {
        $myQueue = new MyQueue();
        $myQueue->push(1); // queue is: [1]
        $myQueue->push(2); // queue is: [1, 2] (leftmost is front of the queue)

        $response = $myQueue->peek(); // return 1
        $this->assertEquals(1, $response);

        $response = $myQueue->pop(); // return 1, queue is [2]
        $this->assertEquals(1, $response);

        $response = $myQueue->empty(); // return false
        $this->assertFalse($response);
    }
}

class MyQueue
{
    private $items;

    /**
     * Initialize your data structure here.
     */
    function __construct()
    {
        $this->items = [];
    }

    /**
     * Push element x to the back of queue.
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->items[] = $x;
    }

    /**
     * Removes the element from in front of queue and returns that element.
     * @return Integer
     */
    function pop()
    {
        return array_shift($this->items);
    }

    /**
     * Get the front element.
     * @return Integer
     */
    function peek()
    {
        return $this->items[0];
    }

    /**
     * Returns whether the queue is empty.
     * @return Boolean
     */
    function empty()
    {
        return (count($this->items) == 0);
    }
}

/**
 * Your MyQueue object will be instantiated and called as such:
 * $obj = MyQueue();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->peek();
 * $ret_4 = $obj->empty();
 */