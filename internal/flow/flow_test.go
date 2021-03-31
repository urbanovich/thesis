package flow

import (
	"testing"
)

func TestFlow(t *testing.T) {
	if str := MainFlow("hello world"); str == "" {
		t.Error("bad")
	}
}
