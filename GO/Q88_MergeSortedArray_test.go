package LeetCode

import (
	"encoding/json"
	"fmt"
	"github.com/fishingboy/LeetCode/Go/Q88"
	"github.com/stretchr/testify/assert"
	"testing"
)

func Test_merge(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name string `json:"name"`
		Args struct {
			Nums1 []int `json:"nums1"`
			M     int   `json:"m"`
			Nums2 []int `json:"nums2"`
			N     int   `json:"n"`
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
			jsonString, _ := json.Marshal(tt)
			fmt.Println(string(jsonString))
			Q88.Merge(tt.Args.Nums1, tt.Args.M, tt.Args.Nums2, tt.Args.N)
			assert.Equal(t, tt.Expected, tt.Args.Nums1, "Test case %s failed", tt.Name)
		})
	}
}
