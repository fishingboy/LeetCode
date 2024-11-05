package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

func isBalanced(num string) bool {
	const ZeroAscii = 48
	even, odd := 0, 0

	for i, v := range num {
		if i%2 == 0 {
			even += int(v - ZeroAscii)
		} else {
			odd += int(v - ZeroAscii)
		}
	}

	return even == odd
}

func Test_isBalanced(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Num string `json:"num"`
		} `json:"args"`
		Expected bool `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q3340.json")
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
			got := isBalanced(tt.Args.Num)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
