package LeetCode

func getEncryptedString(s string, k int) string {
	if k > len(s) {
		k = k % len(s)
	}
	head := s[k:]
	foot := s[:k]
	// fmt.Println(k, len(s), head, foot)
	return head + foot
}