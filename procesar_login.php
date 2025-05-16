<?php
session_start();
require 'conexion.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id, password FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $hash);
    $stmt->fetch();
    if (password_verify($password, $hash)) {
        $_SESSION['usuario'] = $username;
        header("Location: ver_pedidos.php");
        exit();
    }
}

echo "Usuario o contraseña incorrectos.";
