package other

import (
	"encoding/json"
	"fmt"
	"github.com/stretchr/testify/assert"
	"github.com/yinweli/Mizugo/mizugos/cryptos"
	"io/ioutil"
	"testing"
)

func TestString(t *testing.T) {
	str := "abc123"
	str2 := []byte(str)
	fmt.Println(str, str2)
	fmt.Printf("%s %s\n", str, str2)
}

func TestBase64(t *testing.T) {
	coder := cryptos.NewBase64()
	str := []byte("abc123")
	response, err := coder.Encode(str)
	fmt.Printf("response: %s", response)
	if err != nil {
		fmt.Println("error:", err)
	}
	assert.Equal(t, []byte("YWJjMTIz"), response)
}

func TestBase64FromJson(t *testing.T) {
	// 定義測試案例的結構體
	type testCase struct {
		Name   string `json:"name"`
		Str    string `json:"str"`
		Encode string `json:"encode"`
	}

	// 讀取 JSON 文件內容
	jsonString, err := readFromFile("../../TestData/Other/base64.json")
	fmt.Println("jsonString", jsonString)
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
			got, _ := cryptos.NewBase64().Encode([]byte(tt.Str))
			assert.Equal(t, []byte(tt.Encode), got, "Test case %s failed, %s -> %s", tt.Name, tt.Encode, got)
		})
	}
}

func readFromFile(filename string) (string, error) {
	// 讀取文件內容
	content, err := ioutil.ReadFile(filename)
	if err != nil {
		return "", fmt.Errorf("error reading file: %v", err)
	}

	// 將 byte slice 轉換為字符串並返回
	return string(content), nil
}
