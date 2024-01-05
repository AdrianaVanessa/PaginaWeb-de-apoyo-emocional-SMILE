<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="icon" type="image/x-icon" href="images\SMILE.ico">
</head>
<body>
    <H1>Crea una cuenta.</H1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>Llena los campos para crear tu cuenta.</p>
        <div style="text-align: center;">
            <p>Nombre</p>
            <input type="text" name="txtnombre" style="font-size: 18px; width: 250px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;" required/>

            <p>Apellido</p>
            <input type="text" name="txtapellido" style="font-size: 18px; width: 250px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;" required/>

            <p>Correo electrónico</p>
            <input type="email" name="email" style="font-size: 18px; width: 250px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;" required/>

            <p>Contraseña</p>
            <input type="password" name="txtpassword" style="font-size: 18px; width: 250px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;" required/> 
            <br><br>
            <input class="boton" type="submit" value="Registrarse" /> 
            <br>
            <p class="texto-pequeño">¿Ya tienes una cuenta? <a href="login.php" style="color: blue;">Inicia sesión aquí.</a> </p>
            <p class="texto-pequeño">Regresa a la <a href="index.html" style="color: blue;">página principal.</a> </p>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "usuarios_smile";

        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$conn) {
            die("No hay conexión: " . mysqli_connect_error());
        }

        $nombre = $_POST["txtnombre"];
        $apellido = $_POST['txtapellido'];
        $email = $_POST['email'];
        $pass = $_POST["txtpassword"];
        
        $sql = "INSERT INTO usuarios (nombre, apellido, contraseña, correo) VALUES ('$nombre', '$apellido', '$pass', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: 'El usuario ha sido registrado correctamente. Redirigiendo...',
                showConfirmButton: false
            });
            setTimeout(function(){
                window.location.href = 'login.php'; 
            }, 2000); // (3 seg)
         </script>";
        } else {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
                    Swal.fire({
                        icon: 'Error',
                        title: 'Hubo un error al registrar el usuario',
                        text: 'Por favor, verifica tus datos e inténtalo de nuevo'
                    });
                 </script>";
        }

    }
        ?>
  
</body>
</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet');
    body {
            background-color: #FFEEE5; 
            margin: 0;
}
    H1 {
            color: #545454;
            font-size:25px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
}
    p{
            color: #545454;
            font-size:20px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
}
    .texto-pequeño{
            color: #545454;
            font-size:13px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
}
    .boton {
            background-color: #E6836D; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            padding: 10px 90px; /* Espaciado interno del botón (arriba/abajo - izquierda/derecha) */
            margin: 10px; /* Margen exterior del botón */
            border: none; /* Elimina el borde del botón */
            border-radius: 5px; /* Redondea las esquinas del botón */
            text-align: center; /* Alinea el texto al centro del botón */
            text-decoration: none; /* Elimina el subrayado del texto del botón */
            display: inline-block; /* Hace que el botón se comporte como un elemento en línea */
            font-size: 16px; /* Tamaño de la fuente del botón */
}
</style>