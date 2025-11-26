package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"maps"
	"testing"
)

// 每個字串都一樣長度，那可以不用預先把排列組合算完

func findSubstring(s string, words []string) []int {
	result := []int{}
	totalLength := 0
	length := len(words[0])

	// 先把 words 放進 map ，順便統計數量
	wordsMap := map[string]int{}
	for _, word := range words {
		wordsMap[word]++
		totalLength += len(word)
	}

	// 把子字串取出來，切分完和 map 做比對
	processMap := map[string]int{}
	for i := 0; i < len(s)-totalLength+1; i++ {
		maps.Copy(processMap, wordsMap)
		for j := 0; j < len(words); j++ {
			sub := s[i+j*length : i+(j+1)*length]
			if processMap[sub] == 0 {
				break
			}
			processMap[sub]--
		}

		isResult := true
		for _, count := range processMap {
			if count > 0 {
				isResult = false
				break
			}
		}
		if isResult {
			result = append(result, i)
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
