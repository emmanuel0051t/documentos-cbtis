<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Plantilla</title>
    <link rel="stylesheet" href="style.css"> <!-- Usa el CSS general -->
</head>
<body>
    <header>
        <h1>Seleccionar Plantilla</h1>
    </header>

    <main>
        <section>
            <h2>Plantillas Disponibles</h2>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                <?php
                // Conexión a la base de datos
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "documentacion docentes cbtis 169";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Recuperar el nombre del docente desde la URL
                $nombreDocente = $_GET['nombre'] ?? 'Nombre no especificado';

                // Consulta para obtener todas las plantillas
                $sql = "SELECT * FROM plantillas";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Dependiendo de la descripción, establece la redirección
                        $descripcion = strtolower($row['descripcion']);
                        $paginaRedirigir = ($descripcion === 'constancia') ? 'documento.php' : (($descripcion === 'diploma') ? 'diploma.php' : '#');

                        echo "<tr>
                                <td>{$row['nombre']}</td>
                                <td>{$row['descripcion']}</td>
                                <td>
                                    <a href='{$paginaRedirigir}?nombre={$nombreDocente}&plantilla={$row['nombre']}'>Usar</a> |
                                    <a href='eliminar_plantilla.php?id={$row['id']}'>Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay plantillas disponibles.</td></tr>";
                }

                $conn->close();
                ?>
            </table>
        </section>

        
    </main>
</body>
</html>
