<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista 1  de Docentes</title>
</head>
<body>
<a href="agregar.php">Agregar Docente</a>   <a href="principal.php" c>regresar al inicio</a>

    <?php
     // Conexión a la base de datos
    $servername = "sql3.freesqldatabase.com";
$username = "sql3748075";
$password = "ptlwjFgaww";
$dbname = "sql3748075";
     $conn = new mysqli($servername, $username, $password, $dbname);

     if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Consulta para obtener todos los docentes
    $sql = "SELECT * FROM informacion";
    $result = $conn->query($sql);

    // Mostrar los docentes en una tabla HTML
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Nombre</th><th>Acciones</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["docente"] . "</td><td>
               
                <a href='eliminar.php?id=" . $row["id"] . "'>Eliminar</a>
            </td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron docentes.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>

    
</body>
</html>
