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
func reverseKGroup(head *ListNode, k int) *ListNode {
	var before *ListNode
	curr := head
	list := []*ListNode{}

	i := 0
	for curr != nil {
		i++

		// 記錄新的 head
		if i == k {
			head = curr
		}

		// 收集 K 個 node
		list = append(list, curr)

		// 往下尋訪
		curr = curr.Next

		// 累積到 K 個
		if i%k == 0 {
			// 先把上一段的尾巴接上
			if before != nil {
				before.Next = list[k-1]
			}

			// 接上下一段
			list[0].Next = list[k-1].Next

			// 反過來排
			for j := k - 1; j > 0; j-- {
				list[j].Next = list[j-1]
			}

			// 記錄一下尾巴
			before = list[0]

			// 清空暫存的 list
			list = []*ListNode{}
		}
	}

	return head
}

func Test_reverseKGroup(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Head []int `json:"head"`
			K    int   `json:"k"`
		} `json:"args"`
		Expected []int `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromQuestionNo()
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
			got := list2array(reverseKGroup(head, tt.Args.K))
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
