package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

func mySqrt(x int) int {
	for i := 0; i <= x; i++ {
		if i*i == x {
			return i
		} else if i*i > x {
			return i - 1
		}
	}
	return 0
}

func Test_mySqrt(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			X int `json:"x"`
		} `json:"args"`
		Expected int `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q69.json")
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
			got := mySqrt(tt.Args.X)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
