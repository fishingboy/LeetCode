package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

func maxDepth(s string) int {
	stack := []byte{}
	curr := 0
	maximum := 0
	for i := 0; i < len(s); i++ {
		c := s[i]
		if c == '(' {
			stack = append(stack, '(')
			curr++
		} else if c == ')' {
			stack = stack[:len(stack)-1]
			curr--
		}

		if curr > maximum {
			maximum = curr
		}
	}

	return maximum
}

func Test_maxDepth(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			S string `json:"s"`
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
			got := maxDepth(tt.Args.S)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
