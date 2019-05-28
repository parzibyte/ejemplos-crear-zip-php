<?php
/**
 * Trabajando con archivos ZIP en PHP
 * Ejemplo 4: agregar directorio y contenido de manera recursiva
 *
 * @author parzibyte
 */
$zip = new ZipArchive();
// Ruta absoluta
$nombreArchivoZip = __DIR__ . "/4-directorio.zip";
$rutaDelDirectorio = __DIR__ . "/imágenes";

if (!$zip->open($nombreArchivoZip, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    exit("Error abriendo ZIP en $nombreArchivoZip");
}
// Si no hubo problemas, continuamos

// Crear un iterador recursivo que tendrá un iterador recursivo del directorio
$archivos = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rutaDelDirectorio),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($archivos as $archivo) {
    // No queremos agregar los directorios, pues los nombres
    // de estos se agregarán cuando se agreguen los archivos
    if ($archivo->isDir()) {
        continue;
    }

    $rutaAbsoluta = $archivo->getRealPath();
    // Cortamos para que, suponiendo que la ruta base es: C:\imágenes ...
    // [C:\imágenes\perro.png] se convierta en [perro.png]
    // Y no, no es el basename porque:
    // [C:\imágenes\vacaciones\familia.png] se convierte en [vacaciones\familia.png]
    $nombreArchivo = substr($rutaAbsoluta, strlen($rutaDelDirectorio) + 1);
    $zip->addFile($rutaAbsoluta, $nombreArchivo);
}
// No olvides cerrar el archivo
$resultado = $zip->close();
if ($resultado) {
    echo "Archivo creado";
} else {
    echo "Error creando archivo";
}
