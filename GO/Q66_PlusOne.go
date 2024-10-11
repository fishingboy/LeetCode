package LeetCode

func plusOne(digits []int) []int {
	d := 0
	v := 0
	digits[len(digits)-1]++
	for i := len(digits) - 1; i >= 0; i-- {
		v = digits[i] + d
		if v >= 10 {
			digits[i] = v - 10
			d = 1
		} else {
			d = 0
			digits[i] = v
		}
	}

	if d == 1 {
		digits = append([]int{1}, digits...)
	}

	return digits
}
