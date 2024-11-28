<?php
// Datos de conexión
$servername = "sql3.freesqldatabase.com";
$username = "sql3748075";
$password = "ptlwjFgaww";
$dbname = "sql3748075";

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si se enviaron datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $descripcion = $conn->real_escape_string($_POST['descripcion']);
    $ruta = 'ruta/ejemplo'; // Cambiar según dónde se almacenará la plantilla

    // Insertar plantilla en la base de datos
    $sql = "INSERT INTO plantillas (nombre, descripcion, ruta) VALUES ('$nombre', '$descripcion', '$ruta')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('plantilla agregada correctamente.'); window.location.href='Docentes.php';</script>";
        exit();
    } else {
        echo "Error al agregar la plantilla: " . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>Agregar Plantilla</title>
</head>
<body>
    <h2>Agregar Nueva Plantilla</h2>
    <form action="agregar_plantilla.php" method="POST">
        <label for="nombre">Nombre de la Plantilla:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="descripcion">Tipo de Documento:</label>
        <select id="descripcion" name="descripcion" required>
            <option value="Constancia">Constancia</option>
            <option value="Diploma">Diploma</option>
        </select>

        <button type="submit">Agregar Plantilla</button>
    </form>
</body>
</html>
