<?php
// Datos de conexión
$servername = "sql3.freesqldatabase.com";
$username = "sql3748075";
$password = "ptlwjFgaww";
$dbname = "sql3748075";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verificar si se recibió el ID de la plantilla
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Preparar la consulta de eliminación
    $sql = "DELETE FROM plantillas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Plantilla eliminada exitosamente.";
    } else {
        echo "Error al eliminar plantilla: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "No se recibió un ID válido.";
}

$conn->close();

// Redirigir de vuelta a plantillas.php
header("Location: plantillas.php");
exit();
?>
