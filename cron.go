package main

/*
	Ejemplo simple de cómo usar cron en Go

	@author parzibyte
*/
import (
	"fmt"
	"github.com/robfig/cron"
)

func main() {
	// Crear un cron
	c := cron.New()
	// Por cierto, al terminar lo detenemos
	// https://parzibyte.me/blog/2018/12/18/defer-go/
	defer c.Stop()
	// Agregarle funciones...

	// Ejecutar cada segundo toda la vida
	c.AddFunc("* * * * * *", func() {
		fmt.Println("Me imprimo cada segundo")
	})

	// Comenzar
	c.Start()

	// Lo siguiente es únicamente para pausar el programa y no tiene nada
	// que ver con cron o el ejemplo, recuerda que
	// el programa se detiene con Ctrl + C
	select {}
}
