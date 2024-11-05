package LeetCode

import (
	"encoding/json"
	"fmt"
	"github.com/stretchr/testify/assert"
	"testing"
)

func addBinary(a string, b string) string {
	const ZeroAscii = 48
	output := ""
	maxLen := max(len(a), len(b))
	d := uint8(0)
	for i := 0; i < maxLen; i++ {
		aBit, bBit := uint8(0), uint8(0)
		aIndex := len(a) - i - 1
		if aIndex >= 0 {
			aBit = a[aIndex] - ZeroAscii
		}

		bIndex := len(b) - i - 1
		if bIndex >= 0 {
			bBit = b[bIndex] - ZeroAscii
		}

		cBit := aBit + bBit + d
		if cBit >= 2 {
			cBit -= 2
			d = 1
		} else {
			d = 0
		}

		//fmt.Println(aBit, bBit)
		output = fmt.Sprintf("%s%s", string(cBit+ZeroAscii), output)
	}

	if d > 0 {
		output = fmt.Sprintf("%s%s", string(d+ZeroAscii), output)
	}
	return string(output)
}

func Test_AddBinary(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			A string `json:"a"`
			B string `json:"b"`
		} `json:"args"`
		Expected string `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q67.json")
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
			got := addBinary(tt.Args.A, tt.Args.B)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
