<?php
$host = "fdb1030.awardspace.net";
$user = "4581386_bellasbakery";
$password = "T23u-GQ-0mfu";
$dbname = "4581386_bellasbakery";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
