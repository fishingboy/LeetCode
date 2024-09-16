package LeetCode

import (
	"strings"
)

func lengthOfLastWord(s string) int {
	temp := strings.Split(s, " ")
	for i := len(temp) - 1; i >= 0; i-- {
		if len(temp[i]) > 0 {
			return len(temp[i])
		}
	}
	return 0
}
