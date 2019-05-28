<?php
/**
 * Trabajando con archivos ZIP en PHP
 * Ejemplo 2: simple creación de archivo zip
 * con un poco de contenido, para mandarlo
 * para su descarga
 *
 * @author parzibyte
 */
$zip = new ZipArchive();
// Ruta absoluta
$nombreArchivoZip = __DIR__ . "/2-simple.zip";

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
if (!$resultado) {
    exit("Error creando archivo");
}

// Ahora que ya tenemos el archivo lo enviamos como respuesta
// para su descarga

// El nombre con el que se descarga
$nombreAmigable = "simple.zip";
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=$nombreAmigable");
// Leer el contenido binario del zip y enviarlo
readfile($nombreArchivoZip);

// Si quieres puedes eliminarlo después:
unlink($nombreArchivoZip);
