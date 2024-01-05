<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="images\SMILE.ico">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet');
        body {
            background-color: #FFEEE5; 
            margin: 0;
        }
        .centered-image {
            display: block; /* Convertir la imagen en un bloque */
            margin: auto; /* Establecer márgenes automáticos para centrar */
            width: 380px; /* Ancho deseado de la imagen */
        }
        H1 {
            color: #545454;
            font-size:20px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
        }
        p{
            color: #545454;
            font-size:20px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
        }
        .boton {
            background-color: #E6836D; /* Color de fondo del botón */
            color: white; /* Color del texto del botón */
            padding: 10px 110px; /* Espaciado interno del botón (arriba/abajo - izquierda/derecha) */
            margin: 10px; /* Margen exterior del botón */
            border: none; /* Elimina el borde del botón */
            border-radius: 5px; /* Redondea las esquinas del botón */
            text-align: center; /* Alinea el texto al centro del botón */
            text-decoration: none; /* Elimina el subrayado del texto del botón */
            display: inline-block; /* Hace que el botón se comporte como un elemento en línea */
            font-size: 16px; /* Tamaño de la fuente del botón */
        }
        .texto-pequeño{
            color: #545454;
            font-size:13px;
            font-family: 'Open Sans', sans-serif;
            text-align: center; 
        }
    </style>
</head>
<body>
    <div>
        <!-- imagen antes del texto para float -->
        <img src="images/smile_index.png" alt="smile login" width="400" class="centered-image">
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <p>Llena los campos para iniciar sesión.</p>
        <div style="text-align: center;">
            <p>Correo electrónico</p>
            <input type="email" name="email" style="font-size: 18px; width: 250px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;"/>

            <p>Contraseña</p>
            <input type="password" name="txtpassword" style="font-size: 18px; width: 250px; height: 30px; border: 1px solid #ccc; border-radius: 5px; padding: 5px;"/> 
            <br><br>
            <input class="boton" type="submit" value="Entrar" /> 
            <br>
            <p class="texto-pequeño">¿No tienes una cuenta? <a href="registro.php" style="color: blue;">Regístrate aquí.</a> </p>
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

        $email = $_POST["email"];
        $pass = $_POST["txtpassword"];

        $query = mysqli_query($conn, "SELECT * FROM usuarios WHERE correo = '" . $email . "' and contraseña = '" . $pass . "'");
        $nr = mysqli_num_rows($query);

        if ($nr == 1) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Datos correctos',
                        text: 'Iniciando sesión...',
                        showConfirmButton: false
                    });
                    setTimeout(function(){
                        window.location.href = 'home.php'; 
                    }, 2000); // (2 seg)
                 </script>";
        } else if ($nr == 0) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>";
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuario no encontrado',
                        text: 'Por favor, verifica tus credenciales'
                    });
                 </script>";
        }
    }
    ?>
</body>
</html>
