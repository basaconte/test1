<?php
// Iniciar sesión y verificar si el usuario está autenticado
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: login.php');
    exit;
}

require_once 'db_config.php';

// Conexión a la base de datos con PDO
try {
    $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("ERROR: No se pudo conectar. " . $e->getMessage());
}

// Obtener clientes
$stmt = $pdo->query("SELECT name, email, phone FROM customers ORDER BY id DESC");
$customers = $stmt->fetchAll();

unset($pdo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Panel de Control</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7@8.3.0/framework7-bundle.min.css">
</head>
<body>
    <div id="app">
        <div class="view view-main view-init">
            <div class="page">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="title">Panel de Control</div>
                        <div class="right">
                            <span class="navbar-text">Hola, <b><?php echo htmlspecialchars($_SESSION['email']); ?></b></span>
                            <a href="logout.php" class="button button-small button-fill button-round">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="block-title">Lista de Clientes</div>
                    <div class="block block-strong no-padding">
                        <div class="data-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="label-cell">Nombre</th>
                                        <th class="label-cell">Email</th>
                                        <th class="label-cell">Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($customers)): ?>
                                        <tr>
                                            <td colspan="3" class="text-align-center">No hay clientes registrados.</td>
                                        </tr>
                                    <?php else: ?>
                                        <?php foreach ($customers as $customer): ?>
                                            <tr>
                                                <td class="label-cell"><?php echo htmlspecialchars($customer['name']); ?></td>
                                                <td class="label-cell"><?php echo htmlspecialchars($customer['email']); ?></td>
                                                <td class="label-cell"><?php echo htmlspecialchars($customer['phone']); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="block">
                        <a href="index.html" class="button button-fill button-large">Añadir Nuevo Cliente</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/framework7@8.3.0/framework7-bundle.min.js"></script>
    <script>
        var app = new Framework7({
            root: '#app',
            name: 'My App',
            id: 'com.myapp.test',
        });
    </script>
</body>
</html>