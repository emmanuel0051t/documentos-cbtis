<?php
include('conexion.php'); // Asegúrate de tener este archivo con tu conexión

// Recuperar los datos enviados desde el formulario
$nombre_docente = $_POST['nombre_docente'];
$nombre_documento = $_POST['nombre_documento'];
$plantilla = $_POST['plantilla'];
$fecha_creacion = date('Y-m-d H:i:s'); // Fecha y hora actuales

// Guardar el documento en la base de datos
$sql = "INSERT INTO historial_documentos (nombre_docente, nombre_documento, plantilla, fecha_creacion)
        VALUES ('$nombre_docente', '$nombre_documento', '$plantilla', '$fecha_creacion')";

if (mysqli_query($conexion, $sql)) {
    echo "Documento guardado correctamente.";
} else {
    echo "Error al guardar el documento: " . mysqli_error($conexion);
}
?>
