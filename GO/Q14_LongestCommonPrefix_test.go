package LeetCode

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

func Test_longestCommonPrefix(t *testing.T) {
	type args struct {
		strs []string
	}
	tests := []struct {
		name string
		args args
		want string
	}{
		{
			name: "test1",
			args: args{strs: []string{"flower", "flow", "flight"}},
			want: "fl",
		},
		{
			name: "test2",
			args: args{strs: []string{"dog", "racecar", "car"}},
			want: "",
		},
		{
			name: "wa1",
			args: args{strs: []string{"a"}},
			want: "a",
		},
		{
			name: "wa2",
			args: args{strs: []string{"", "b"}},
			want: "",
		},
		{
			name: "wa3",
			args: args{strs: []string{"ab", "a"}},
			want: "a",
		},
	}
	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			got := longestCommonPrefix(tt.args.strs)
			assert.Equal(t, tt.want, got)
		})
	}
}
