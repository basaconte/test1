document.getElementById('customer-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);

    fetch('save_customer.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        const responseDiv = document.getElementById('response');
        if (data.success) {
            responseDiv.innerHTML = 'Cliente guardado correctamente.';
            document.getElementById('customer-form').reset();
        } else {
            responseDiv.innerHTML = 'Error al guardar el cliente: ' + data.error;
        }
    })
    .catch(error => {
        document.getElementById('response').innerHTML = 'Error: ' + error;
    });
});
