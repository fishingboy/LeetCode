<?php
namespace LeetCode\Q155;
use PHPUnit\Framework\TestCase;

class Q155_MinStack_Test extends TestCase
{
    public function testSample1()
    {
        $minStack = new MinStack();
        $minStack->push(-2);
        $minStack->push(0);
        $minStack->push(-3);

        $response = $minStack->getMin(); // return -3
        $this->assertEquals(-3, $response);

        $response = $minStack->pop();
        $this->assertEquals(-3, $response);

        $response = $minStack->top();    // return 0
        $this->assertEquals(0, $response);

        $response = $minStack->getMin(); // return -2
        $this->assertEquals(-2, $response);
    }
}

class MinStack
{
    private $stack;

    /**
     * initialize your data structure here.
     */
    function __construct()
    {

    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->stack[] = $x;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        return array_pop($this->stack);
    }

    /**
     * @return Integer
     */
    function top()
    {
        return $this->stack[count($this->stack) - 1];
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        return min($this->stack);
    }
}
