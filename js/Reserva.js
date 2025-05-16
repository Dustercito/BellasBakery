document.getElementById('orderForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Evita recarga

    const formData = new FormData(this);

    fetch('procesar_pedido.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.text())
    .then(response => {
        document.getElementById('msgSubmit').innerText = response;
        document.getElementById('orderForm').reset();
    })
    .catch(error => {
        document.getElementById('msgSubmit').innerText = "Error al enviar el pedido.";
        console.error(error);
    });
});