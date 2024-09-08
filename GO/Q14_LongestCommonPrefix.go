package LeetCode

func longestCommonPrefix(strs []string) string {
	if len(strs) == 1 {
		return strs[0]
	}

	minLen := -1
	for _, str := range strs {
		if minLen == -1 || len(str) < minLen {
			minLen = len(str)
		}
	}

	if minLen == 0 {
		return ""
	}

	prefix := 0
	find := false
	var pre uint8 = 0
	for i := 0; i <= minLen && !find; i++ {
		if i == minLen {
			prefix = i
			break
		}

		pre = 0
		for _, str := range strs {
			if pre == 0 {
				pre = str[i]
			} else if pre != str[i] {
				prefix = i
				find = true
				break
			}
		}
	}
	//fmt.Println(prefix)

	if prefix < 0 {
		return ""
	}

	output := strs[0][:prefix]
	return output
}
