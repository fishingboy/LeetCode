package LeetCode

import "fmt"

func longestCommonPrefix(strs []string) string {
	var minLen int
	for _, str := range strs {
		if minLen == 0 || len(str) < minLen {
			minLen = len(str)
		}
	}

	prefix := 0
	for i := 0; i < minLen; i++ {
		var pre uint8 = 0
		for _, str := range strs {
			if pre == 0 {
				pre = str[i]
			} else if pre != str[i] {
				prefix = i - 1
			}
		}
	}
	fmt.Println(prefix)

	if prefix < 0 {
		return ""
	}

	return strs[0][:prefix]
}
