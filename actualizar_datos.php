<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Conexión a la base de datos
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "usuarios_smile";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error());
}

// Obtener datos del formulario de edición
$user_id = $_SESSION['user_id'];
$nombre = $_POST['nombre'] ?? '';
$apellido = $_POST['apellido'] ?? '';
$correo = $_POST['correo'] ?? '';
$password = $_POST['password'] ?? '';

// algoritmo de hashing 
if (!empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', contraseña = '$hashed_password' WHERE id = $user_id";
} else {
    $query = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', correo = '$correo' WHERE id = $user_id";
}


if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true, 'message' => 'Datos actualizados correctamente']);
} else {
    echo json_encode(['success' => false, 'message' => 'Hubo un problema al actualizar los datos: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>
