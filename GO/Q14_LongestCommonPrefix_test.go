package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

func longestCommonPrefix(strs []string) string {
	if len(strs) == 1 {
		return strs[0]
	}

	minLen := -1
	for _, str := range strs {
		if minLen == -1 || len(str) < minLen {
			minLen = len(str)
		}
	}

	if minLen == 0 {
		return ""
	}

	prefix := 0
	find := false
	var pre uint8 = 0
	for i := 0; i <= minLen && !find; i++ {
		if i == minLen {
			prefix = i
			break
		}

		pre = 0
		for _, str := range strs {
			if pre == 0 {
				pre = str[i]
			} else if pre != str[i] {
				prefix = i
				find = true
				break
			}
		}
	}

	output := strs[0][:prefix]
	return output
}

func Test_longestCommonPrefix(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Strs []string `json:"strs"`
		} `json:"args"`
		Expected string `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q14.json")
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
			got := longestCommonPrefix(tt.Args.Strs)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
