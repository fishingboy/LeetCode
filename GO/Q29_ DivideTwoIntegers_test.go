package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"math"
	"testing"
)

// 題目要求不能使用乘法/除法/取餘數

func divide(dividend int, divisor int) int {
	if dividend == 0 {
		return 0
	}

	if divisor < 0 {
		dividend = -dividend
		divisor = -divisor
	}

	output := 0
	minOutput := math.MinInt32
	maxOutput := math.MaxInt32

	if dividend > 0 {
		for dividend >= 0 {
			output++
			dividend -= divisor
		}
		output--
	} else {
		for dividend <= 0 {
			output--
			dividend += divisor
		}
		output++
	}

	if output < minOutput {
		return minOutput
	} else if output > maxOutput {
		return maxOutput
	} else {
		return output
	}
}

func Test_divide(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Dividend int `json:"dividend"`
			Divisor  int `json:"divisor"`
		} `json:"args"`
		Expected int `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q29.json")
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
			got := divide(tt.Args.Dividend, tt.Args.Divisor)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
