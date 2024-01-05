<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="icon" type="image/x-icon" href="images\SMILE.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<nav class="bg-custom navbar navbar-expand-lg d-lg-none">
    <div class="container-fluid bg-custom container-fluid">
        <button class="navbar-toggler bg-custom" type="button" data-bs-toggle="collapse" data-bs-target="#menuLateral"
            aria-controls="menuLateral" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse bg-custom" id="menuLateral">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="chat.php">Chats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">mas pag</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid custom-container">
    <div class="row h-100">
        <!-- menu lateral -->
        <div class="col-md-1 col-sm-4 bg-custom d-flex flex-column d-none d-lg-block">
            <div class="d-flex flex-column align-items-center">

            <div class="circle-icon2 mt-3 mb-3">
                <i class="fas fa-bars mb-2 mt-2 fa-2x color-white"></i>
            </div>

            <div class="circle-icon mt-3 mb-3">
                <i class="fas fa-home mb-2 mt-2 fa-2x color-white"></i>
            </div>

            <div class="circle-icon2 mt-3 mb-3">
            <a href="chat.php">
                <i class="fas fa-comment mb-2 mt-2 fa-2x color-white"></i>
            </a>
            </div>

            <div class="circle-icon2 mt-3 mb-3">
                <i class="fas fa-book-open mb-2 mt-2 fa-2x color-white"></i>
            </div>

            <div class="circle-icon2 mt-3 mb-3">
                <i class="fas fa-user-tie mb-2 mt-2 fa-2x color-white"></i>
            </div>

            <div class="circle-icon2 mt-3 mb-3">
                <i class="fas fa-puzzle-piece mb-2 mt-2 fa-2x color-white"></i>
            </div>

            <div class="circle-icon2 mt-3 mb-3">
                <i class="fas fa-microphone mb-2 mt-2 fa-2x color-white"></i>
            </div>

            <div class="circle-icon2 mt-3 mb-3">
                <i class="fas fa-user-plus mb-2 mt-2 fa-2x color-white"></i>
            </div>
            
        </div>
        </div>
        <!-- pantalla principal -->
        <div class="col-md-8 col-sm-12 bg-custom-principal d-flex flex-column">
            <h2>Columna 2</h2>
            <p>wwwwwwwwwwwwwwwwwwwwww.</p>
        </div>
        <!-- pantalla usuario -->
        <div class="col-md-3 col-sm-12 bg-custom-user d-flex flex-column d-none d-lg-block">
            <h2>Columna 3</h2>
            <p>aaaaaaaaaaaaa.</p>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<style>
    .custom-container {
        height: 100vh; /* Establece la altura al 100% del viewport */
    }
    .bg-custom {
        background-color: #E6836D; /* Puedes cambiar el código de color por el que desees */
    }
    .bg-custom-principal {
        background-color: #FFEEE5; /* Puedes cambiar el código de color por el que desees */
    }
    .bg-custom-user {
        background-color: #FFFFFF; /* Puedes cambiar el código de color por el que desees */
    }
    .color-white {
    color: white; 
}
.circle-icon {
    width: 45px; /* Ancho del círculo */
    height: 45px; /* Alto del círculo */
    border-radius: 50%; /* Hace que el elemento sea circular */
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(240, 240, 240, 0.4);; /* Color gris claro */
}
.circle-icon2 {
    width: 45px; /* Ancho del círculo */
    height: 45px; /* Alto del círculo */
    border-radius: 50%; /* Hace que el elemento sea circular */
    display: flex;
    justify-content: center;
    align-items: center;
}

</style>

</body>
</html>
