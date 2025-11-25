package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"strings"
	"testing"
)

func convert(s string, numRows int) string {
	if numRows == 1 {
		return s
	}

	str := make([]string, numRows)

	way := 0
	top := 0

	for i := 0; i < len(s); i++ {
		c := string(s[i])

		if way == 0 {
			// 往下
			str[top] += c
			if top == numRows-1 {
				// 轉向上
				top = numRows - 2
				way = 1
			} else {
				top++
			}
		} else {
			// 往上
			str[top] += c
			if top == 0 {
				// 轉向下
				top = 1
				way = 0
			} else {
				top--
			}
		}
	}

	return strings.Join(str, "")
}

func Test_convert(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			S       string `json:"s"`
			NumRows int    `json:"numRows"`
		} `json:"args"`
		Expected string `json:"expected"`
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
			got := convert(tt.Args.S, tt.Args.NumRows)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
