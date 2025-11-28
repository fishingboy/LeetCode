package LeetCode

import (
	"encoding/json"
	"fmt"
	"github.com/stretchr/testify/assert"
	"testing"
)

func nextPermutation(nums []int) {
	if len(nums) == 1 {
		return
	}

	var i, j int
outer:
	// 先把最後開始往前找，看有比較小的元素做交換
	for i = len(nums) - 2; i >= 0; i-- {
		for j = len(nums) - 1; j > i; j-- {
			if nums[i] < nums[j] {
				nums[i], nums[j] = nums[j], nums[i]
				break outer
			}
		}
	}

	// 剩下的部份直接做反轉
	left := i + 1
	right := len(nums) - 1
	for left < right {
		nums[left], nums[right] = nums[right], nums[left]
		left++
		right--
	}
}

func Test_nextPermutation(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Nums []int `json:"nums"`
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
			nums := tt.Args.Nums
			nextPermutation(nums)
			assert.Equal(t, tt.Expected, nums, "Test case %s failed", tt.Name)
		})
	}
}

func Test_nextPermutation1(t *testing.T) {
	nums := []int{1, 2, 3}
	for i := 0; i < 12; i++ {
		fmt.Println(nums)
		nextPermutation(nums)
	}
}

func Test_nextPermutation2(t *testing.T) {
	nums := []int{1, 2, 3, 4}
	for i := 0; i < 24; i++ {
		fmt.Println(nums)
		nextPermutation(nums)
	}
}

func Test_nextPermutation3(t *testing.T) {
	nums := []int{1, 2, 3, 4, 5}
	for i := 0; i < 120; i++ {
		fmt.Println(nums)
		nextPermutation(nums)
	}
}

func Test_nextPermutation4(t *testing.T) {
	nums := []int{5, 4, 3, 2, 1}
	nextPermutation(nums)
	fmt.Println(nums)
}
