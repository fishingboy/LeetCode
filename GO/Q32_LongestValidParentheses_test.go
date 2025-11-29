package LeetCode

import (
	"encoding/json"
	"fmt"
	"github.com/stretchr/testify/assert"
	"strings"
	"testing"
)

func longestValidParentheses(s string) int {
	result := 0
	//maxResult := 0
	invalid := []int{}
	stackChar := []byte{}
	stackPos := []int{}

	// 先掃一遍找出非法的地方
	for i := 0; i < len(s); i++ {
		bit := s[i]
		if bit == '(' {
			stackChar = append(stackChar, bit)
			stackPos = append(stackPos, i)
		} else if bit == ')' {
			if len(stackChar) > 0 && stackChar[len(stackChar)-1] == '(' {
				stackChar = stackChar[:len(stackChar)-1]
				stackPos = stackPos[:len(stackPos)-1]
			} else {
				result = 0
				stackChar = []byte{}
				invalid = append(invalid, i)
			}
		} else {
			result = 0
			stackChar = []byte{}
			invalid = append(invalid, i)
		}
	}

	invalid = append(invalid, stackPos...)

	// 把非法的地方切開，計算長度即可
	str := []byte(s)
	for i := 0; i < len(invalid); i++ {
		str[invalid[i]] = ' '
	}
	s = string(str)
	strs := strings.Split(s, " ")

	// 計算長度
	for i := 0; i < len(strs); i++ {
		if len(strs[i]) > result {
			result = len(strs[i])
		}
	}

	return result
}

func Test_longestValidParentheses(t *testing.T) {
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
			got := longestValidParentheses(tt.Args.S)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}

func Test_longestValidParentheses2(t *testing.T) {
	got := longestValidParentheses(")()())")
	fmt.Println(got)
}

func Test_longestValidParentheses3(t *testing.T) {
	got := longestValidParentheses("(()(()()()()))")
	fmt.Println(got)
}
