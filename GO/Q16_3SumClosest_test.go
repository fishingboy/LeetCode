package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"slices"
	"testing"
)

func threeSumClosest(nums []int, target int) int {
	slices.Sort(nums)

	result, resultDiff := -1, -1
	diff := 0

	for i := 1; i < len(nums)-1; i++ {
		l, r := 0, len(nums)-1
		for l < i && r > i {
			sum := nums[i] + nums[l] + nums[r]
			diff = sum - target

			if diff == 0 {
				return target
			}

			if diff < 0 {
				diff = -diff
			}

			if result == -1 || diff < resultDiff {
				result = sum
				resultDiff = diff
			}

			if sum > target {
				r--
			} else {
				l++
			}
		}
	}

	return result
}

func Test_threeSumClosest(t *testing.T) {
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
	jsonString, err := readFromFile("../TestData/Q16.json")
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
			got := threeSumClosest(tt.Args.Nums, tt.Args.Target)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
