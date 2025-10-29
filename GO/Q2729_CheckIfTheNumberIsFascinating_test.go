package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"testing"
)

func isFascinating(n int) bool {
	m := [10]bool{}
	nums := []int{n, 2 * n, 3 * n}

	for _, num := range nums {
		for num > 0 {
			bit := num % 10

			if m[bit] == true || bit == 0 {
				return false
			}

			m[bit] = true
			num = num / 10
		}
	}

	return true
}

func Test_isFascinating(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			N int `json:"n"`
		} `json:"args"`
		Expected bool `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q2729.json")
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
			got := isFascinating(tt.Args.N)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
