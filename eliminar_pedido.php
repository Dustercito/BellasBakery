<?php
$host = "fdb1030.awardspace.net";
$user = "4581386_bellasbakery";
$password = "T23u-GQ-0mfu";
$dbname = "4581386_bellasbakery";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $sql = "DELETE FROM pedidos WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ver_pedidos.php?mensaje=eliminado");
        exit;
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
$conn->close();
?>
