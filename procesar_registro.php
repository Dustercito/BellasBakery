<?php
require 'conexion.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    header("Location: login2.php");
} else {
    echo "Error al registrar: " . $stmt->error;
}
