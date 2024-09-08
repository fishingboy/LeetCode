package LeetCode

import (
	"github.com/stretchr/testify/assert"
	"testing"
)

func Test_isValid(t *testing.T) {
	type args struct {
		s string
	}
	tests := []struct {
		name string
		args args
		want bool
	}{
		{
			name: "sample1",
			args: args{s: "()"},
			want: true,
		},
		{
			name: "sample2",
			args: args{s: "()[]{}"},
			want: true,
		},
		{
			name: "sample3",
			args: args{s: "(]"},
			want: false,
		},
		{
			name: "sample4",
			args: args{s: "([])"},
			want: true,
		},
		{
			name: "wa1",
			args: args{s: "["},
			want: false,
		},
	}

	for _, tt := range tests {
		t.Run(tt.name, func(t *testing.T) {
			assert.Equalf(t, tt.want, isValid(tt.args.s), "isValid(%v)", tt.args.s)
		})
	}
}
