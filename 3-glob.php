<?php
/**
 * Trabajando con archivos ZIP en PHP
 * Ejemplo 3: agregar archivos a partir de patrón GLOB
 *
 * @author parzibyte
 */
$zip = new ZipArchive();
// Ruta absoluta
$nombreArchivoZip = __DIR__ . "/3-glob.zip";

if (!$zip->open($nombreArchivoZip, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    exit("Error abriendo ZIP en $nombreArchivoZip");
}
// Si no hubo problemas, continuamos

$zip->addGlob("*.go");
$zip->addGlob("*.log");
$zip->addGlob("*.xlsx");
$zip->addGlob("*.js");
// Otros ejemplos: $zip->addGlob("./imagenes/*.png");
// Otros ejemplos: $zip->addGlob("*.php");
// Otros ejemplos: $zip->addGlob("*.*");

// No olvides cerrar el archivo
$resultado = $zip->close();
if ($resultado) {
    echo "Archivo creado";
} else {
    echo "Error creando archivo";
}
