package LeetCode

import (
	"encoding/json"
	"fmt"
	"github.com/stretchr/testify/assert"
	"sort"
	"testing"
)

var output []string

func generateParenthesis(n int) []string {
	output = []string{}
	genP(n, "()")
	sort.Strings(output)
	return output
}

func genP(n int, s string) {
	if n == 1 {
		isDuplicate := false
		for _, item := range output {
			if s == item {
				isDuplicate = true
				break
			}
		}

		if !isDuplicate {
			output = append(output, s)
		}

		return
	}

	genP(n-1, "()"+s)
	for i := 1; i < len(s); i++ {
		genP(n-1, s[:i]+"()"+s[i:])
	}
	genP(n-1, s+"()")
}

func Test_2(t *testing.T) {
	generateParenthesis(2)
	fmt.Println(output)
}

func Test_3(t *testing.T) {
	generateParenthesis(3)
	fmt.Println(output)
}

func Test_generateParenthesis(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			N int `json:"n"`
		} `json:"args"`
		Expected []string `json:"expected"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../TestData/Q22.json")
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
			got := generateParenthesis(tt.Args.N)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
