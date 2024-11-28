<?php
// Conexión a la base de datos (reemplaza con tus credenciales)
$servername = "sql3.freesqldatabase.com";
$username = "sql3748075";
$password = "ptlwjFgaww";
$dbname = "sql3748075";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
}

// Procesar datos del formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario (asegúrate de sanitizarlos para prevenir inyecciones SQL)
    $docente = $_POST["docente"];
    // Otros campos que quieras agregar (e.g., email, telefono, etc.)

    // Preparar la sentencia SQL (usando prepared statements para prevenir inyecciones SQL)
    $sql = "INSERT INTO informacion (docente) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $docente); // "s" indica que el parámetro es una cadena

    // Ejecutar la sentencia
 
    // ... (tu código de conexión a la base de datos)
    
    // ... (resto de tu código)
    
    // Ejecutar la sentencia
    if ($stmt->execute()) {
        echo "<script>alert('Docente agregado correctamente.'); window.location.href='tabla.php';</script>";
    } else {
        echo "Lo sentimos, hubo un error al eliminar el docente.";
    }
    
    $stmt->close();
   
 
}

// Cerrar la conexión
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
    <title>Agregar Docente</title>
</head>
<body>
    <h2>Agregar Nuevo Docente</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="docente">Nombre del Docente:</label>
        <input type="text" name="docente" required>
        <button type="submit">Agregar</button>
    </form>
</body>
</html>