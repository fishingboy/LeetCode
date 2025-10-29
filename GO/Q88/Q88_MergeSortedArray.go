package Q88

func Merge(nums1 []int, m int, nums2 []int, n int) {
	merge(nums1, m, nums2, n)
}

func merge(nums1 []int, m int, nums2 []int, n int) {
	nums3 := []int{}

	index1 := 0
	index2 := 0
	for i := 0; i < m+n; i++ {
		if index1 >= m {
			nums3 = append(nums3, nums2[index2])
			index2++
			continue
		}

		if index2 >= n {
			nums3 = append(nums3, nums1[index1])
			index1++
			continue
		}

		if nums1[index1] < nums2[index2] {
			nums3 = append(nums3, nums1[index1])
			index1++
		} else {
			nums3 = append(nums3, nums2[index2])
			index2++
		}
	}

	// 必須要將 nums3 用 copy 蓋回去
	copy(nums1, nums3)
}
