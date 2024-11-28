<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="style2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docentes</title>
    
</head>
<body>
            
<h1>Lista de Docentes</h1>



    
<?php
// Datos de conexión a la base de datos
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

// Consulta SQL para obtener los nombres de los profesores
$sql = "SELECT docente FROM informacion";
$result = $conn->query($sql);

// Mostrar los nombres en un formulario o lista desplegable
if ($result->num_rows > 0) {
    echo "<div class='docente-container'>";
    while ($row = $result->fetch_assoc()) {
        $docente = $row['docente']; // Assuming 'docente' is the column name
        echo "<button onclick='redireccionar(\"$docente\")'><span>$docente</span></button>";
    }
    echo "</div>";
} else {
    echo "No hay profesores registrados.";
}

$conn->close();
?>



   

    

<script>
    function redireccionar(nombre) {
        // Redirigir a plantillas.php con el nombre del docente como parámetro
        window.location.href = `plantillas.php?nombre=${encodeURIComponent(nombre)}`;
    }
</script>

</body>

</html>

