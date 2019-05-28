<?php
/**
 * Trabajando con archivos ZIP en PHP
 * Ejemplo 1: simple creación de archivo zip
 * con un poco de contenido
 *
 * @author parzibyte
 */
$zip = new ZipArchive();
// Ruta absoluta
$nombreArchivoZip = __DIR__ . "/1-simple.zip";

if (!$zip->open($nombreArchivoZip, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    exit("Error abriendo ZIP en $nombreArchivoZip");
}
// Si no hubo problemas, continuamos
// Agregamos el script.js
// Su ruta absoluta, como D:\documentos\codigo\script.js
$rutaAbsoluta = __DIR__ . "/script.js";
// Su nombre resumido, algo como "script.js"
$nombre = basename($rutaAbsoluta);
$zip->addFile($rutaAbsoluta, $nombre);

// No olvides cerrar el archivo
$resultado = $zip->close();
if ($resultado) {
    echo "Archivo creado";
} else {
    echo "Error creando archivo";
}
