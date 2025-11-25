package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

func isValid(s string) bool {
	var stack []int32
	var element int32
	for _, v := range s {
		if v == ')' || v == '}' || v == ']' {
			stack, element = pop(stack)
			if v == ')' && element != '(' {
				return false
			} else if v == '}' && element != '{' {
				return false
			} else if v == ']' && element != '[' {
				return false
			}
		} else {
			stack = append(stack, v)
		}
	}
	return len(stack) == 0
}

func pop(slice []int32) ([]int32, int32) {
	if len(slice) == 0 {
		return slice, 0 // or handle empty case as needed
	}
	lastElement := slice[len(slice)-1]
	slice = slice[:len(slice)-1]
	return slice, lastElement
}

func Test_isValid(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			S string `json:"s"`
		} `json:"args"`
		Expected bool `json:"expected"`
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
			got := isValid(tt.Args.S)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
