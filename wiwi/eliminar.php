<?php
// Conexión a la base de datos (reemplaza con tus credenciales)
$servername = "sql3.freesqldatabase.com";
$username = "sql3748075";
$password = "ptlwjFgaww";
$dbname = "sql3748075";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Lo sentimos, hubo un error al conectar a la base de datos.");
}

// Obtener el ID del docente a eliminar desde la URL
$id = $_GET['id'];

// Preparar la sentencia SQL (usando prepared statements para prevenir inyecciones SQL)
$sql = "DELETE FROM informacion WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id); // "i" indica que el parámetro es un entero

// Ejecutar la sentencia

// ... (tu código de conexión a la base de datos)

// ... (resto de tu código)

// Ejecutar la sentencia
if ($stmt->execute()) {
    echo "<script>alert('Docente eliminado correctamente.'); window.location.href='tabla.php';</script>";
} else {
    echo "Lo sentimos, hubo un error al eliminar el docente.";
}

$stmt->close();
$conn->close();
?>