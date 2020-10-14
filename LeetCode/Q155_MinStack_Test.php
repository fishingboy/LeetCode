<?php
namespace LeetCode\Q155;
use PHPUnit\Framework\TestCase;

/**
 * @todo
 */
class Q155_MinStack_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new MinStack();
    }

    public function testSample1()
    {
        $x = 1;

        $obj = $this->solution;
        $obj->push($x);
        $response = $obj->pop();
        $this->assertEquals(1, $response);
//        $ret_3 = $obj->top();
//        $ret_4 = $obj->getMin();
    }
}

class MinStack
{
    private $stack;
    private $i;

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
//        return 1;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        return 1;
    }

    /**
     * @return Integer
     */
    function top()
    {
        return 1;
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        return 1;
    }
}
