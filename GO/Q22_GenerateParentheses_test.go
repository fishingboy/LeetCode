package LeetCode

import (
	"encoding/json"
	"github.com/stretchr/testify/assert"
	"sort"
	"testing"
)

func generateParenthesis(n int) []string {
	output := []string{}

	for i := 0; i < n; i++ {
		process := []string{}

		if i == 0 {
			output = append(output, "()")
			continue
		} else {
			for _, item := range output {
				// 插入下一個括號
				for j := 0; j <= i+1; j++ {
					s := item[:j] + "()" + item[j:]

					// 去除重覆
					isDuplicate := false
					for _, processItem := range process {
						//fmt.Println(processItem, s)
						if processItem == s {
							isDuplicate = true
							break
						}
					}

					if !isDuplicate {
						process = append(process, s)
					}
				}
			}
		}

		output = process
	}

	sort.Strings(output)
	return output
}

func Test_2(t *testing.T) {
	generateParenthesis(2)
	//fmt.Println(output)
}

func Test_3(t *testing.T) {
	generateParenthesis(3)
	//fmt.Println(output)
}

func Test_8(t *testing.T) {
	generateParenthesis(8)
	//fmt.Println(output)
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
			got := generateParenthesis(tt.Args.N)
			assert.Equal(t, tt.Expected, got, "Test case %s failed", tt.Name)
		})
	}
}
