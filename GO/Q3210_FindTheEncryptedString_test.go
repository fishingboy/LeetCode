package GO

import (
	"fmt"
	"testing"
)

func TestGetEncryptedString(t *testing.T) {
	response := GetEncryptedString("dart", 3)
	fmt.Println(response)
}
