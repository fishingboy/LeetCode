package LeetCode

func twoSum(nums []int, target int) []int {
	count := len(nums)
	for i := 0; i < count-1; i++ {
		for j := i + 1; j < count; j++ {
			if i != j && nums[i]+nums[j] == target {
				return []int{i, j}
			}
		}
	}
	return []int{0, 0}
}
