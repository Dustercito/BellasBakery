<?php
$host = "fdb1030.awardspace.net";
$user = "4581386_bellasbakery";
$password = "T23u-GQ-0mfu";
$dbname = "4581386_bellasbakery";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=pedidos.csv');

$output = fopen('php://output', 'w');
fputcsv($output, ['ID', 'Nombre', 'Correo', 'Teléfono', 'Fecha', 'Hora', 'Detalles', 'Fecha de creación']);

$result = $conn->query("SELECT * FROM pedidos ORDER BY id DESC");
while ($row = $result->fetch_assoc()) {
    fputcsv($output, [
        $row['id'],
        $row['nombre'],
        $row['correo'],
        $row['telefono'],
        $row['fecha'],
        $row['hora'],
        $row['detalles'],
        $row['fecha_creacion']
    ]);
}
fclose($output);
$conn->close();
?>
