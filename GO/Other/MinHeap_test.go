package other

import (
	"fmt"
	"testing"
)

type MinHeap struct {
	items []int
}

func (this *MinHeap) Push(n int) {
	this.items = append(this.items, n)
	i := len(this.items) - 1
	//level := math.Log2(float64(i))
	//fmt.Println("level", level)
	for i > 0 {
		parent := (i - 1) / 2
		if this.items[i] < this.items[parent] {
			temp := this.items[parent]
			this.items[parent] = this.items[i]
			this.items[i] = temp
		}
		i = parent
	}
}

func (this *MinHeap) Pop() int {
	if len(this.items) == 0 {
		return -1
	}

	// 取出根節點
	n := this.items[0]

	// 把最後一個節點移到根節點
	this.items[0] = this.items[len(this.items)-1]
	this.items = this.items[:len(this.items)-1]

	i := 0
	for i < len(this.items) {
		// 先比較子節點的大小
		childes := []int{}
		childIndex := 0

		if i*2+1 < len(this.items) {
			childes = append(childes, i*2+1)
		}

		if i*2+2 < len(this.items) {
			childes = append(childes, i*2+2)
		}

		if len(childes) == 0 {
			break
		} else if len(childes) == 1 {
			childIndex = childes[0]
		} else if this.items[childes[1]] > this.items[childes[0]] {
			childIndex = childes[0]
		} else {
			childIndex = childes[1]
		}

		// 跟小的那個比
		if this.items[childIndex] < this.items[i] {
			temp := this.items[childIndex]
			this.items[childIndex] = this.items[i]
			this.items[i] = temp
			i = childIndex
		} else {
			break
		}
	}

	return n
}

func TestMinHeap(t *testing.T) {
	m := &MinHeap{}
	fmt.Println(m)
	m.Push(1)
	m.Push(9)
	m.Push(50)
	m.Push(4)
	m.Push(99)
	m.Push(500)
	m.Push(100)
	m.Push(9900)
	m.Push(990)
	m.Push(8)
	m.Push(7)

	fmt.Println(m)
	for {
		n := m.Pop()
		if n == -1 {
			break
		}
		fmt.Println("n => ", n)
		fmt.Println("items", m.items)
	}
}
