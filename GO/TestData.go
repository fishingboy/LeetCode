package LeetCode

import (
	"fmt"
	"io/ioutil"
)

type ListNode struct {
	Val  int
	Next *ListNode
}

func array2List(nums []int) *ListNode {
	var node, firstNode, beforeNode *ListNode

	for _, item := range nums {
		node = &ListNode{
			Val:  item,
			Next: nil,
		}

		if firstNode == nil {
			firstNode = node
		}

		if beforeNode != nil {
			beforeNode.Next = node
		}

		beforeNode = node
	}

	return firstNode
}

func list2array(node *ListNode) (result []int) {
	for node != nil {
		result = append(result, node.Val)
		node = node.Next
	}
	return result
}

func readFromFile(filename string) (string, error) {
	// 讀取文件內容
	content, err := ioutil.ReadFile(filename)
	if err != nil {
		return "", fmt.Errorf("error reading file: %v", err)
	}

	// 將 byte slice 轉換為字符串並返回
	return string(content), nil
}
