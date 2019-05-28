package main
/*
	Segundo ejemplo de cómo usar cron en Go

	@author parzibyte
*/
import (
	"fmt"
	"github.com/robfig/cron"
	"time"
)

func main() {
	// Crear un cron
	c := cron.New()
	// Por cierto, al terminar lo detenemos
	defer c.Stop()
	// Agregarle funciones...

	// Ejecutar en los segundos que sean múltiplos de 10
	// es decir, en el minuto con 10, 20, y hasta 60 segundos
	c.AddFunc("*/10 * * * * *", func() {
		fmt.Printf("Me estoy imprimiendo cada múltiplo de 10 segundos. La hora es %s\n", obtenerHoraActual())
	})

	// Ejecutar en los segundos que sean múltiplos de 30
	// (es decir, en el minuto con 0 segundos y en el minuto con 30 segundos)
	c.AddFunc("*/30 * * * * *", decirHola)

	//Cada segundo con función anónima
	c.AddFunc("* * * * * *", func() {
		fmt.Printf("Me ejecuto cada segundo. La hora es %s\n", obtenerHoraActual())
	})

	//Todos los martes a las 12 con 58 en punto
	c.AddFunc("0 58 12 * * 2", func() {
		fmt.Printf("Me ejecuto los martes a las 12:58:00. La hora es %s\n", obtenerHoraActual())
	})

	// Comenzar
	c.Start()

	// Lo siguiente es únicamente para pausar el programa y no tiene nada
	// que ver con cron o el ejemplo, recuerda que
	// el programa se detiene con Ctrl + C
	select {}
}

func obtenerHoraActual() string {
	t := time.Now()
	return t.Format("15:4:5")
}

func decirHola() {
	fmt.Printf("Yo me ejecuto en cada 30 segundos. La hora es %s\n", obtenerHoraActual())
}
