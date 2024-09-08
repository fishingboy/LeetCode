package LeetCode

func isValid(s string) bool {
	var stack []int32
	var element int32
	for _, v := range s {
		if v == ')' || v == '}' || v == ']' {
			stack, element = pop(stack)
			if v == ')' && element != '(' {
				return false
			} else if v == '}' && element != '{' {
				return false
			} else if v == ']' && element != '[' {
				return false
			}
		} else {
			stack = append(stack, v)
		}
	}
	return len(stack) == 0
}

func pop(slice []int32) ([]int32, int32) {
	if len(slice) == 0 {
		return slice, 0 // or handle empty case as needed
	}
	lastElement := slice[len(slice)-1]
	slice = slice[:len(slice)-1]
	return slice, lastElement
}
