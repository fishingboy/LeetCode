package LeetCode

import "testing"

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
			if got := longestCommonPrefix(tt.args.strs); got != tt.want {
				t.Errorf("longestCommonPrefix() = %v, want %v", got, tt.want)
			}
		})
	}
}
