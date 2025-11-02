package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"slices"
	"sort"
	"testing"
)

func threeSum(nums []int) [][]int {
	sort.Ints(nums)

	result := [][]int{}

	for i := 1; i < len(nums)-1; i++ {
		l := 0
		r := len(nums) - 1
		for l < i && r > i {
			sum := nums[i] + nums[l] + nums[r]
			if sum == 0 {
				answer := []int{nums[l], nums[i], nums[r]}
				l++
				r--

				idDuplicate := false

				for _, item := range result {
					if slices.Equal(answer, item) {
						idDuplicate = true
						break
					}
				}

				if !idDuplicate {
					result = append(result, answer)
				}
			} else if sum > 0 {
				r--
			} else {
				l++
			}
		}
	}

	return result
}

func Test_threeSum(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Nums []int `json:"nums"`
		} `json:"args"`
		Expected [][]int `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q15.json")
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
			got := threeSum(tt.Args.Nums)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
