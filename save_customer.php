<?php

require_once 'db_config.php';

header('Content-Type: application/json');

$response = [];

try {
    // Data Source Name (DSN)
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    
    // Opciones de PDO
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    // Crear una nueva instancia de PDO
    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';

    if (empty($name) || empty($email)) {
        throw new Exception('Nombre y email son campos obligatorios.');
    }

    $sql = "INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$name, $email, $phone])) {
        $response['success'] = true;
    } else {
        // Esto es redundante si ERRMODE_EXCEPTION está activado, pero se mantiene por claridad
        throw new Exception('Error al guardar el cliente.');
    }

} catch (PDOException $e) {
    $response['success'] = false;
    $response['error'] = 'Error de base de datos: ' . $e->getMessage();
} catch (Exception $e) {
    $response['success'] = false;
    $response['error'] = $e->getMessage();
}

echo json_encode($response);

?>
