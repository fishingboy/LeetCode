<?php
namespace LeetCode\Q225;
use PHPUnit\Framework\TestCase;

class Q225_ImplementStack_using_Queues_Test extends TestCase
{
    public function setUp()
    {
    }

    public function testSample1()
    {
        $myStack = new MyStack();
        $myStack->push(1);
        $myStack->push(2);
        $response = $myStack->top(); // return 2
        $this->assertEquals(2, $response);
        $response = $myStack->pop(); // return 2
        $this->assertEquals(2, $response);
        $response = $myStack->empty(); // return False
        $this->assertFalse($response);
    }
}

class MyStack
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
     * Push element x onto stack.
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->items[] = $x;
    }

    /**
     * Removes the element on top of the stack and returns that element.
     * @return Integer
     */
    function pop()
    {
        return array_pop($this->items);
    }

    /**
     * Get the top element.
     * @return Integer
     */
    function top()
    {
        return $this->items[count($this->items) - 1];
    }

    /**
     * Returns whether the stack is empty.
     * @return Boolean
     */
    function empty()
    {
        return count($this->items) == 0;
    }
}

/**
 * Your MyStack object will be instantiated and called as such:
 * $obj = MyStack();
 * $obj->push($x);
 * $ret_2 = $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->empty();
 */