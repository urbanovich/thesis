package api

import "fmt"

type Api struct {
	name string
}

func NewApi(name string) *Api {
	return &Api{
		name: name,
	}
}

func (a *Api) run() {
	fmt.Println(a.name)
}
