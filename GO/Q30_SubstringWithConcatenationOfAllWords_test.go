package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

var perm map[string]string

func findPerm(s string, words []string) {
	if len(words) == 0 {
		perm[s] = s
	}

	for i, word := range words {
		remainWords := []string{}
		remainWords = append(remainWords, words[:i]...)
		remainWords = append(remainWords, words[i+1:]...)
		findPerm(s+word, remainWords)
	}
}

func findSubstring(s string, words []string) []int {
	perm = map[string]string{}
	result := []int{}

	// 先算出所有排列組合
	findPerm("", words)

	// 算出子字串長度
	n := 0
	for _, word := range words {
		n += len(word)
	}

	// 再取固定長度，跟組合內所有字串做比對
	for i := 0; i < len(s)-n+1; i++ {
		sub := s[i : i+n]
		for _, item := range perm {
			if sub == item {
				result = append(result, i)
				break
			}
		}
	}

	return result
}

func Test_findSubstring(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			S     string   `json:"s"`
			Words []string `json:"words"`
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
			got := findSubstring(tt.Args.S, tt.Args.Words)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
