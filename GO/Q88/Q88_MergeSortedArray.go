package Q88

import "fmt"

func Merge(nums1 []int, m int, nums2 []int, n int) {
	fmt.Println("nums1 =>", nums1)
	fmt.Println("nums2 =>", nums2)
	merge(nums1, m, nums2, n)
	fmt.Println("nums1 =>", nums1)
	fmt.Println("nums2 =>", nums2)
}

func merge(nums1 []int, m int, nums2 []int, n int) {
	//fmt.Println(nums1, nums2)

	nums3 := []int{}

	index1 := 0
	index2 := 0
	for i := 0; i < m+n; i++ {
		if index1 >= m {
			//nums3[i] = nums2[index2]
			nums3 = append(nums3, nums2[index2])
			index2++
			continue
		}

		if index2 >= n {
			//nums3[i] = nums1[index1]
			nums3 = append(nums3, nums1[index1])
			index1++
			continue
		}

		if nums1[index1] < nums2[index2] {
			//nums3[i] = nums1[index1]
			nums3 = append(nums3, nums1[index1])
			index1++
		} else {
			//nums3[i] = nums2[index2]
			nums3 = append(nums3, nums2[index2])
			index2++
		}
	}

	fmt.Println("nums3 => ", nums3)

	nums1 = nums3

	fmt.Println("** nums1 => ", nums1)
}
