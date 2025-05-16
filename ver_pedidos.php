<?php
// Conexión a la base de datos
$host = "fdb1030.awardspace.net";
$user = "4581386_bellasbakery";
$password = "T23u-GQ-0mfu";
$dbname = "4581386_bellasbakery";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT * FROM pedidos ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">   
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bella's B - Ver Pedidos</title>

	<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
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
				<a class="navbar-brand" href="">
					<img src="images/logo.png" alt="logo" id="logo"/>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="">Pedidos</a></li>
                        <li class="nav-item"><a class="nav-link" href="registro.php">Registrar usuario</a></li>
                        <li class="nav-item"><a class="nav-link" href="logout.php">Cerrar sesion</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Pedidos Recibidos</h1>
				</div>
			</div>
		</div>
	</div>

	<div class="reservation-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading-title text-center">
						<h2>Pedidos Registrados</h2>
						<p>Aquí puedes consultar todos los pedidos que se han enviado a través del formulario.</p>
					</div>
				</div>
			</div>

			<?php if ($result && $result->num_rows > 0): ?>
            <a href="exportar_pedidos.php" class="btn btn-success mb-3">Exportar a CSV</a>
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Detalles</th>
                            <th>Enviado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
					<tbody>
						<?php while($row = $result->fetch_assoc()): ?>
							<tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['nombre'] ?></td>
                                <td><?= $row['correo'] ?></td>
                                <td><?= $row['telefono'] ?></td>
                                <td><?= $row['fecha'] ?></td>
                                <td><?= $row['hora'] ?></td>
                                <td><?= $row['detalles'] ?></td>
                                <td><?= $row['fecha_creacion'] ?></td>
                                <td>
                                    <form method="POST" action="eliminar_pedido.php" onsubmit="return confirm('¿Estás seguro de eliminar este pedido?');">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
			<?php else: ?>
				<div class="alert alert-info text-center">No se han recibido pedidos aún.</div>
			<?php endif; ?>

		</div>
	</div>

	<footer class="footer-area bg-f">
		<!-- Tu pie de página existente aquí -->
	</footer>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
</body>
</html>

<?php $conn->close(); ?>
