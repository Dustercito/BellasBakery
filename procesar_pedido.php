<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Conexión a la base de datos
    $host = "fdb1030.awardspace.net";
    $user = "4581386_bellasbakery";
    $password = "T23u-GQ-0mfu";
    $dbname = "4581386_bellasbakery";

    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $date = $_POST['date'] ?? '';
    $time = $_POST['time'] ?? '';
    $order_details = $_POST['order_details'] ?? '';

    // Sentencia preparada
    $stmt = $conn->prepare("INSERT INTO pedidos (nombre, correo, telefono, fecha, hora, detalles) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $name, $email, $phone, $date, $time, $order_details);

    if ($stmt->execute()) {
        echo "Pedido enviado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // Si alguien entra directamente por GET
    http_response_code(405);
    echo "Método no permitido.";
}
?>
