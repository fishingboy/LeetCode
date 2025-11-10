package LeetCode

import (
	"encoding/json"
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
func swapPairs(head *ListNode) *ListNode {
	if head == nil || head.Next == nil {
		return head
	}

	var before *ListNode
	curr := head
	head = head.Next

	for curr != nil && curr.Next != nil {
		next := curr.Next
		curr.Next = next.Next
		next.Next = curr

		if before != nil {
			before.Next = next
		}

		before = curr
		curr = curr.Next
	}

	return head
}

func Test_swapPairs(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Head []int `json:"head"`
		} `json:"args"`
		Expected []int `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q24.json")
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
			head := array2List(tt.Args.Head)
			got := list2array(swapPairs(head))
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
