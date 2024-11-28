<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql_user = "INSERT INTO user (username, email) VALUES ('$username', '$email')";

    if ($conn->query($sql_user) === TRUE) {
        $user_id = $conn->insert_id;
        $sql_password = "INSERT INTO password (id, password) VALUES ('$user_id', '$password')";
        
        if ($conn->query($sql_password) === TRUE) {
            echo "Registro exitoso.";
        } else {
            echo "Error: " . $sql_password . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql_user . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="post" action="registro.php">
        Nombre de usuario: <input type="text" name="username" required><br>
        Email: <input type="email" name="email" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>