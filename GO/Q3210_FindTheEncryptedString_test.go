package LeetCode

import (
	"testing"
)

func Test_getEncryptedString(t *testing.T) {
	type args struct {
		s string
		k int
	}
	tests := []struct {
		name string
		args args
		want string
	}{
		{
			name: "example1",
			args: args{s: "dart", k: 3},
			want: "tdar",
		},
		{
			name: "example2",
			args: args{s: "aaa", k: 1},
			want: "aaa",
		},
	}

	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			if got := getEncryptedString(tt.args.s, tt.args.k); got != tt.want {
				t.Errorf("getEncryptedString() = %v, want %v", got, tt.want)
			}
		})
	}
}
