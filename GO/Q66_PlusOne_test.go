package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

func plusOne(digits []int) []int {
	d := 0
	v := 0
	digits[len(digits)-1]++
	for i := len(digits) - 1; i >= 0; i-- {
		v = digits[i] + d
		if v >= 10 {
			digits[i] = v - 10
			d = 1
		} else {
			d = 0
			digits[i] = v
		}
	}

	if d == 1 {
		digits = append([]int{1}, digits...)
	}

	return digits
}

func Test_plusOne(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Digits []int `json:"digits"`
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
			got := plusOne(tt.Args.Digits)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
