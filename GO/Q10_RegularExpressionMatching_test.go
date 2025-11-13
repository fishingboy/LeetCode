package LeetCode

import (
	"encoding/json"
	"fmt"
	"github.com/stretchr/testify/assert"
	"testing"
)

func isMatch(s string, p string) bool {
	// 先把 pattern 切開
	pattern := []string{}

	for i := 0; i < len(p); i++ {
		if p[i] == '*' {
			pattern[len(pattern)-1] = pattern[len(pattern)-1] + "*"
		} else {
			pattern = append(pattern, string(p[i]))
		}
	}

	return isMatchRecursion(s, pattern)
}

func isMatchRecursion(s string, pattern []string) bool {
	//fmt.Println(s, pattern)
	// 遞迴出口
	if len(s) == 0 && len(pattern) == 0 {
		// 全部比對完畢
		return true
	} else if len(pattern) == 0 {
		// pattern 已空
		return false
	}

	if pattern[0] == "." {
		if len(s) == 0 {
			return false
		}
		// 任意字元
		return isMatchRecursion(s[1:], pattern[1:])
	} else if len(pattern[0]) == 1 {
		if len(s) == 0 {
			return false
		}
		// 指定字元
		if pattern[0] == string(s[0]) {
			return isMatchRecursion(s[1:], pattern[1:])
		}
	} else if pattern[0] == ".*" {
		// 任意字元任意數量(0~N個)
		for i := 0; i <= len(s); i++ {
			match := isMatchRecursion(s[i:], pattern[1:])
			if match {
				return true
			}
		}
		return false
	} else {
		// 指定字元任意數量(0~N個)
		matchChar := pattern[0][0]
		for i := 0; i <= len(s); i++ {
			if i > 0 && s[i-1] != matchChar {
				break
			}
			match := isMatchRecursion(s[i:], pattern[1:])
			if match {
				return true
			}
		}
		return false
	}
	return false
}

func Test_isMatch(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			S string `json:"s"`
			P string `json:"p"`
		} `json:"args"`
		Expected bool `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q10.json")
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
			got := isMatch(tt.Args.S, tt.Args.P)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}

func Test_isMatch2(t *testing.T) {
	s := "012345"
	for i := 0; i <= len(s); i++ {
		fmt.Println(i, s[i:])
	}

}
