package LeetCode

import (
	"fmt"
	"io/ioutil"
)

func readFromFile(filename string) (string, error) {
	// 讀取文件內容
	content, err := ioutil.ReadFile(filename)
	if err != nil {
		return "", fmt.Errorf("error reading file: %v", err)
	}

	// 將 byte slice 轉換為字符串並返回
	return string(content), nil
}
