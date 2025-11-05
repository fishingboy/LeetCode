package LeetCode

import (
	"encoding/json"
	"fmt"
	"github.com/stretchr/testify/assert"
	"testing"
)

/**
 * Definition for singly-linked list.
 * type ListNode struct {
 *     Val int
 *     Next *ListNode
 * }
 */
func addTwoNumbers(l1 *ListNode, l2 *ListNode) *ListNode {
	var result, node, beforeNode *ListNode
	node1, node2 := l1, l2
	sum, val1, val2, carry := 0, 0, 0, 0

	for node1 != nil || node2 != nil {
		if node1 != nil {
			val1 = node1.Val
			node1 = node1.Next
		} else {
			val1 = 0
		}

		if node2 != nil {
			val2 = node2.Val
			node2 = node2.Next
		} else {
			val2 = 0
		}

		sum = val1 + val2 + carry

		if sum >= 10 {
			sum -= 10
			carry = 1
		} else {
			carry = 0
		}

		node = &ListNode{
			Val: sum,
		}

		if result == nil {
			result = node
		}

		if beforeNode != nil {
			beforeNode.Next = node
		}

		beforeNode = node
	}

	if carry == 1 {
		node = &ListNode{
			Val: 1,
		}
		beforeNode.Next = node
	}

	return result
}

func Test_addTwoNumbers(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			L1 []int `json:"l1"`
			L2 []int `json:"l2"`
		} `json:"args"`
		Expected []int `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q2.json")
	if err != nil {
		t.Fatalf("Failed to read JSON file: %v", err)
	}

	// 解析 JSON 字符串到測試案例結構體 slice 中
	var tests []testCase
	err = json.Unmarshal([]byte(jsonString), &tests)
	if err != nil {
		t.Fatalf("Failed to unmarshal JSON: %v", err)
	}

	for _, tt := range tests {
		t.Run(tt.Name, func(t *testing.T) {
			l1 := array2List(tt.Args.L1)
			l2 := array2List(tt.Args.L2)
			fmt.Println(l1)
			fmt.Println(l2)
			//l3 :=
			got := list2array(addTwoNumbers(l1, l2))
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
