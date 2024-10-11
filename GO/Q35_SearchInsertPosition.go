package LeetCode

func searchInsert(nums []int, target int) int {
	var middle, high, low int
	high = len(nums)
	low = 0

	if target <= nums[0] {
		return 0
	} else if target > nums[high-1] {
		return high
	}

	for {
		middle = (high + low) / 2
		if nums[middle-1] < target && target <= nums[middle] {
			return middle
		} else if nums[middle] >= target {
			high = middle
		} else if nums[middle] < target {
			low = middle
		}
	}
}
