# Crear archivos zip con PHP: agregar archivos y directorios, descargar zip y proteger con contraseña
Mira el tutorial en mi blog: [PHP y ZIP: tutorial y ejemplos](https://parzibyte.me/blog/2019/05/28/crear-archivos-zip-php/)

Desde hace tiempo he querido hacer un post completo sobre cómo trabajar con archivos ZIP en PHP.

Como sabemos, los archivos ZIP son unos paquetes que permiten tener dentro múltiples archivos para su posterior transporte.

[![](https://i1.wp.com/parzibyte.me/blog/wp-content/uploads/2019/05/Tutorial-de-creaci%C3%B3n-de-archivos-zip-con-PHP.png?resize=684%2C432&ssl=1)](https://i1.wp.com/parzibyte.me/blog/wp-content/uploads/2019/05/Tutorial-de-creaci%C3%B3n-de-archivos-zip-con-PHP.png?ssl=1)


PHP tiene soporte nativo para los archivos ZIP en la clase  `ZipArchive`  y permite comprimir o empaquetar archivos de una manera fácil.

Hoy vamos a ver cómo:

1.  Crear un archivo zip y agregarle contenido
2.  Forzar la descarga de un archivo zip, es decir, crear un zip y mostrarlo en el navegador
3.  Agregar archivos a un zip a partir de un patrón glob
4.  Agregar todo el contenido de un directorio de manera recursiva. Es decir, agregar todo el contenido y si hay un directorio agregar el contenido de ese directorio, así recursivamente.
5.  Proteger un archivo ZIP con contraseña

Todavía no vamos a ver cómo descomprimir o desempaquetar, eso es de otro post.