package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

func searchInsert(nums []int, target int) int {
	var middle, high, low int
	high = len(nums)
	low = 0

	if target <= nums[0] {
		return 0
	} else if target > nums[high-1] {
		return high
	}

	for {
		middle = (high + low) / 2
		if nums[middle-1] < target && target <= nums[middle] {
			return middle
		} else if nums[middle] >= target {
			high = middle
		} else if nums[middle] < target {
			low = middle
		}
	}
}

func Test_SearchInsert(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Nums   []int `json:"nums"`
			Target int   `json:"target"`
		} `json:"args"`
		Expected int `json:"expected"`
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
			got := searchInsert(tt.Args.Nums, tt.Args.Target)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
