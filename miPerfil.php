<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil</title>
    <link rel="icon" type="image/x-icon" href="images\SMILE.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<?php
session_start();

// verificar si el usuario está autenticado
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

// id del usuario de la variable de sesión
$user_id = $_SESSION['user_id'];


$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE id = '$user_id'");
if (mysqli_num_rows($query) == 1) {
    
    $userData = mysqli_fetch_assoc($query);

} else {
    echo "Error al obtener los datos del usuario.";
}
?>

<!-- menu desplegable SOLO en dispositivos chicos -->
<nav class="bg-custom navbar navbar-expand-lg d-lg-none">
    <div class="container-fluid bg-custom container-fluid">
        <button class="navbar-toggler bg-custom" type="button" data-bs-toggle="collapse" data-bs-target="#menuLateral"
            aria-controls="menuLateral" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse bg-custom" id="menuLateral">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="miPerfil.php">Mi perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chat.php">Chats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Publicaciones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Especialistas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Actividades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Podcast</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">SMILEcoins</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid custom-container">
    <div class="row h-100">
        

        <!-- pantalla usuario -->
        <div class="col-md-3 col-sm-12 bg-custom-user d-flex flex-column">

            <div class="mt-3 mb-3">
                <h1><b>Perfil del usuario</b></h1>
            </div>

            <div class="text-align-right mt-3 mb-3">
                <!-- imagen antes del texto para float -->
                <img src="images/user_image.jpeg" alt="user image" class="imagen-izquierda">
                <h2> <?php echo $userData['nombre']. " " . $userData['apellido']; ?>
                </h2>
                <p class="texto-pequeño"><?php echo $userData['correo']; ?></p>
                <div class="iconos-derecha">
                    <i class="fas fa-user-edit ml-6 mx-2" id="editUserData" style="cursor: pointer;"></i>
                    <i class="fas fa-sign-in-alt mx-2" id="logoutLink" style="cursor: pointer;"></i>
                </div>
            </div>

            <br>
            <hr style="background-color: #fff; border-top: 1px solid #8c8b8b;">

            <div class="mt-3 mb-3" style="height: 160px;">
                <h1><b>Mis chats</b></h1>
                <p class="texto-pequeño mt-3 mb-3">Parece que aún no tienes ningún chat</p>
                <p class="texto-pequeño mt-3 mb-3">¡Explora algunos!</p>
                <div style="width: fit-content; margin: 0 auto;">
                    <i class="fas fa-search"></i>
                </div>
            </div>

            <br>
            <hr style="background-color: #fff; border-top: 1px solid #8c8b8b;">

            <div class="mt-3 mb-3" style="height: 150px;">
                <h1><b>Mis podcast</b></h1>
                <p class="texto-pequeño mt-3 mb-3">Parece que aún no tienes ningún podcast</p>
                <p class="texto-pequeño mt-3 mb-3">¡Explora algunos!</p>
                <div style="width: fit-content; margin: 0 auto;">
                    <i class="fas fa-search"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script>
        document.getElementById("logoutLink").addEventListener("click", function(e) {
        e.preventDefault();
        
        if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
        
            fetch('cerrar_sesion.php') 
            .then(response => {
                if (response.ok) {
                    window.location.href = 'login.php';
                } else {
                    console.error('Ocurrió un error al cerrar sesión.');
                }
            })
            .catch(error => console.error('Error:', error));
    } else {
        console.log('El usuario canceló el cierre de sesión');
    }
});
</script>
<script>
    document.getElementById("editUserData").addEventListener("click", function() {
    Swal.fire({
        title: 'Editar información',
        html:
        '<input id="nombre" class="swal2-input" placeholder="Nombre" value="<?php echo $userData['nombre']; ?>" required>' +
            '<input id="apellido" class="swal2-input" placeholder="Apellido" value="<?php echo $userData['apellido']; ?>" required>' +
            '<input id="correo" class="swal2-input" placeholder="Correo electrónico" value="<?php echo $userData['correo']; ?>" required>' +
            '<input type="password" id="password" class="swal2-input" placeholder="Nueva contraseña">',

        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar cambios',
        cancelButtonText: 'Cancelar',
        preConfirm: () => {
            const nombre = Swal.getPopup().querySelector('#nombre').value;
            const apellido = Swal.getPopup().querySelector('#apellido').value;
            const correo = Swal.getPopup().querySelector('#correo').value;
            const password = Swal.getPopup().querySelector('#password').value;


            const formData = new FormData();
            formData.append('nombre', nombre);
            formData.append('apellido', apellido);
            formData.append('correo', correo);
            formData.append('password', password);
            
            fetch('actualizar_datos.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Error al actualizar los datos');
                }
            })
            .then(data => {
                console.log(data); 
                Swal.fire('¡Datos actualizados!', 'Tus datos han sido actualizados correctamente.', 'success');
                    setTimeout(() => {
                        location.reload();
                    }, 3000);
            })
            .catch(error => {
                console.error(error);
                Swal.fire('Error', 'Hubo un problema al actualizar los datos.', 'error');
            });
        }
    });
});

</script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet');
    H2 {
            color: #545454;
            font-size:20px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
}
    H1 {
            color: #545454;
            font-size:20px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
}
    .custom-container {
        height: 100vh; /* altura al 100% del viewport */
}
    .bg-custom {
        background-color: #E6836D;
}
    .bg-custom-principal {
        background-color: #FFEEE5; 
}
    .bg-custom-user {
        background-color: #FFFFFF; 
}
    .color-white {
    color: white; 
}
    .circle-icon {
    width: 45px; 
    height: 45px; 
    border-radius: 50%; 
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(240, 240, 240, 0.4);; /* gris claro */
}
    .circle-icon2 {
    width: 45px; 
    height: 45px; 
    border-radius: 50%; 
    display: flex;
    justify-content: center;
    align-items: center;
}
    .imagen-izquierda {
            float: left; /* alinea la imagen a la derecha */
            margin-right: 20px; /* separar la imagen del texto */
            border-radius: 10%;
            width: 100px;
}
    .imagen-izquierda2 {
            float: left; /* alinea la imagen a la derecha */
            margin-right: 20px; /* separar la imagen del texto */
            border-radius: 10%;
            width: 520px;
            max-width: 100%;
            height: auto;
}
    .imagenes-derecha {
            float: right; /* alinea la imagen a la derecha */
            margin-right: 70px; /* separar la imagen del texto */
            width: 100px;
}
    .iconos-derecha {
            float: right; /* alinea la imagen a la derecha */
            margin-right: 70px; /* separar la imagen del texto */
}
    .texto-pequeño{
            color: #545454;
            font-size:13px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
}
    .texto-izquierda{
            text-align: left; 
}
    .contenedor-images{
    display: flex;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
}
    .bloque {
    text-align: center;
    margin: 10px;
    flex: 0 0 calc(20% - 20px); /* ancho para 3 elementos en una fila */
}
    .imagen {
    max-width: 200px; 
    height: auto; 
    margin-bottom: 20px; 
    border-radius: 10%;
}
    .texto-pequeño2 {
    color: #737373;
    text-align: center; 
    font-size:17px;
    font-family: 'Open Sans', sans-serif;
}
</style>

</body>
</html>
