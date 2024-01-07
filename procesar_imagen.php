<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "usuarios_smile";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("No hay conexión: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["foto_perfil"])) {
    $user_id = $_SESSION['user_id'];

    $file = $_FILES["foto_perfil"];
    $nombre = $file["name"];
    $tipo = $file["type"];
    $ruta_provicional = $file["tmp_name"];
    $size = $file["size"];

    $directorio = 'fotos/';

    $ruta = $directorio . $nombre; 

    if (move_uploaded_file($ruta_provicional, $ruta)) {
        $query = "UPDATE usuarios SET foto_perfil = '$ruta' WHERE id = $user_id";
        header("Location: home.php");
    } else {
        echo "Error al mover el archivo al directorio de destino.";
    }
}
if (mysqli_query($conn, $query)) {
    echo json_encode(['success' => true, 'message' => 'La imagen se subió correctamente.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al subir la imagen: ' . mysqli_error($conn)]);
}

mysqli_close($conn);
?>

