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

        $minStack->pop();

        $response = $minStack->top();    // return 0
        $this->assertEquals(0, $response);

        $response = $minStack->getMin(); // return -2
        $this->assertEquals(-2, $response);
    }

    public function testSample1_1()
    {
        $actions = ["MinStack","push","push","push","getMin","pop","top","getMin"];
        $params = [[],[-2],[0],[-3],[],[],[],[]];
        $response = $this->operation($actions, $params);
        $this->assertArraySubset([null,null,null,null,-3,null,0,-2], $response);
    }

    public function test_WA1()
    {
        $actions = ["MinStack","push","push","push","top","pop","getMin","pop","getMin","pop","push","top","getMin","push","top","getMin","pop","getMin"];
        $params = [[],[2147483646],[2147483646],[2147483647],[],[],[],[],[],[],[2147483647],[],[],[-2147483648],[],[],[],[]];
        $response = $this->operation($actions, $params);

        echo "<pre>response = " . print_r($response, true) . "</pre>\n";

        $this->assertArraySubset([null,null,null,null,2147483647,null,2147483646,null,2147483646,null,null,2147483647,2147483647,null,-2147483648,-2147483648,null,2147483647], $response);
    }

    public function operation($actions, $params)
    {
        $minStack = new MinStack();

        $output = [];
        while (count($actions)) {
            $action = array_shift($actions);
            $param = array_shift($params);

            $response = null;
            switch ($action) {
                case "MinStack":
                    break;
                case "push":
                    $minStack->push($param[0]);
                    break;
                case "pop":
                    $minStack->pop();
                    break;
                case "top":
                    $response = $minStack->top();
                    break;
                case "getMin":
                    $response = $minStack->getMin();
                    break;
            }
            $output[] = $response;
        }
        return $output;
    }
}

class MinStack
{
    private $stack = [];
    private $min_stack = [];
    private $curr_min = null;

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
        if ($this->curr_min === null || $x < $this->curr_min) {
            $this->curr_min    = $x;
            $this->min_stack[] = $x;
        } else {
            $this->min_stack[] = $this->curr_min;
        }

        $this->stack[] = $x;
    }

    /**
     * @return NULL
     */
    function pop()
    {
        array_pop($this->min_stack);
        array_pop($this->stack);

        if (count($this->stack) == 0) {
            $this->curr_min = null;
        }

        return NULL;
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
        return $this->min_stack[count($this->min_stack) - 1];
    }
}
