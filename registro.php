<?php

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - Bella's Bakery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Estilos -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/style.css">    
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
</head>
<body>

<header class="top-navbar">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="logo" id="logo"/>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>

<div class="all-page-title page-breadcrumb">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12">
                <h1>Registrarse</h1>
            </div>
        </div>
    </div>
</div>

<div class="reservation-box">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="heading-title text-center">
                    <h2>Crear cuenta de administrador</h2>
                    <p>Introduce un nombre de usuario y una contraseña.</p>
                </div>

                <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-danger text-center"><?= htmlspecialchars($_GET['error']) ?></div>
                <?php endif; ?>
                <?php if (isset($_GET['exito'])): ?>
                    <div class="alert alert-success text-center"><?= htmlspecialchars($_GET['exito']) ?></div>
                <?php endif; ?>

                <form method="POST" action="procesar_registro.php">
                    <div class="form-group">
                        <label>Usuario:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Contraseña:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-success">Registrarse</button>
                        <a href="login2.php" class="btn btn-link">¿Ya tienes cuenta? Inicia sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Pie de página -->
<footer class="footer-area bg-f">
    <!-- Tu pie de página aquí -->
</footer>

<!-- Scripts -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
