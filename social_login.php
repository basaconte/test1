<?php
require_once __DIR__ . '/vendor/autoload.php';

$config = require_once 'config-social.php';

$provider = $_GET['provider'] ?? null;

if (empty($provider) || !isset($config['providers'][$provider])) {
    die("Proveedor no válido.");
}

try {
    $hybridauth = new Hybridauth\Hybridauth($config);
    $adapter = $hybridauth->authenticate($provider);
    // Si la autenticación es exitosa, HybridAuth ya ha redirigido al callback.
    // No se necesita más código aquí.
} catch (Exception $e) {
    die("Error de autenticación: " . $e->getMessage());
}
