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
func mergeKLists(lists []*ListNode) *ListNode {
	var firstNode, beforeNode *ListNode

	for {
		minN := 99999
		minI := -1

		for i, node := range lists {
			if node == nil {
				continue
			}

			if node.Val < minN {
				minN = node.Val
				minI = i
			}
		}

		if minI == -1 {
			break
		}

		if firstNode == nil {
			firstNode = lists[minI]
		}

		if beforeNode != nil {
			beforeNode.Next = lists[minI]
		}

		beforeNode = lists[minI]

		lists[minI] = lists[minI].Next
	}

	return firstNode
}

func Test_mergeKLists(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Lists [][]int `json:"lists"`
		} `json:"args"`
		Expected []int `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q23.json")
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
			lists := []*ListNode{}
			for _, list := range tt.Args.Lists {
				lists = append(lists, array2List(list))
			}
			got := list2array(mergeKLists(lists))
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
