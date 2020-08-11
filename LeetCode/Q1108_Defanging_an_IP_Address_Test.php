<?php
namespace LeetCode\Q1108;
use PHPUnit\Framework\TestCase;

class Q1108_Defanging_an_IP_Address_Test extends TestCase
{
    /**
     * @var Solution
     */
    private $solution;

    public function setUp()
    {
        $this->solution = new Solution();
    }

    public function test_sample1()
    {
        $address = "1.1.1.1";
        $response = $this->solution->defangIPaddr($address);
        $this->assertEquals("1[.]1[.]1[.]1", $response);
    }
}

class Solution
{
    /**
     * @param String $address
     * @return String
     */
    function defangIPaddr($address)
    {
        return str_replace(".", "[.]", $address);
    }
}