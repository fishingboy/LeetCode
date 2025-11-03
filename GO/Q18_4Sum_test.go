package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"slices"
	"sort"
	"testing"
)

func fourSum(nums []int, target int) [][]int {
	sort.Ints(nums)
	result := [][]int{}
	length := len(nums)

	for i := 0; i <= length-3; i++ {
		for j := i + 1; j <= length-2; j++ {
			l, r := j+1, length-1

			for l < r {
				sum := nums[i] + nums[j] + nums[l] + nums[r]
				answer := []int{nums[i], nums[j], nums[l], nums[r]}
				if sum == target {
					isDuplicate := false
					for _, resultItem := range result {
						if slices.Equal(answer, resultItem) {
							isDuplicate = true
							break
						}
					}

					if !isDuplicate {
						result = append(result, answer)
					}

					r--
					l++
				} else if sum > target {
					r--
				} else {
					l++
				}
			}
		}
	}

	return result
}

func Test_fourSum(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Nums   []int `json:"nums"`
			Target int   `json:"target"`
		} `json:"args"`
		Expected [][]int `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q18.json")
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
			got := fourSum(tt.Args.Nums, tt.Args.Target)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
