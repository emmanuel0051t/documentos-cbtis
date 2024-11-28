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

// Obtener el ID del docente a editar desde la URL
$id = $_GET['id'];

// Obtener los datos del docente actual
$sql = "SELECT * FROM informacion WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Procesar datos del formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario (asegúrate de sanitizarlos para prevenir inyecciones SQL)
    $docente = $_POST["docente"];
    // Otros campos que quieras editar (e.g., email, telefono, etc.)

    // Preparar la sentencia SQL para actualizar
    $sql = "UPDATE informacion SET docente=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $docente, $id);
    $stmt->execute();

    echo "Docente actualizado correctamente.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Docente</title>
</head>
<body>
    <h2>Editar Docente</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="docente">Nombre 1  del Docente:</label>
        <input type="text" name="docente" value="<?php echo $row['docente']; ?>" required>
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>