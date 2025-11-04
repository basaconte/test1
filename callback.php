<?php
session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once 'db_config.php';

$config = require_once 'config-social.php';

try {
    // Instanciar HybridAuth
    $hybridauth = new Hybridauth\Hybridauth($config);

    // Procesar la autenticación
    $adapter = $hybridauth->authenticate('Google');

    // Obtener el perfil del usuario
    $userProfile = $adapter->getUserProfile();

    if ($userProfile && isset($userProfile->email)) {
        // Conexión a la base de datos con PDO
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
            $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die("ERROR: No se pudo conectar. " . $e->getMessage());
        }

        // Verificar si el usuario ya existe en la base de datos
        $stmt = $pdo->prepare("SELECT id, email FROM users WHERE email = ?");
        $stmt->execute([$userProfile->email]);
        $user = $stmt->fetch();

        if ($user) {
            // El usuario ya existe, iniciar sesión
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
        } else {
            // El usuario no existe, crearlo
            // Nota: La contraseña se guarda como un hash vacío, ya que la autenticación es gestionada por Google.
            $password_hash = password_hash(uniqid(), PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$userProfile->email, $password_hash]);
            $new_user_id = $pdo->lastInsertId();

            // Iniciar sesión para el nuevo usuario
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $new_user_id;
            $_SESSION['email'] = $userProfile->email;
        }

        // Redireccionar al panel de control
        header('Location: dashboard.php');
        exit();

    } else {
        die("No se pudo obtener el perfil del usuario de Google.");
    }

} catch (Exception $e) {
    // Manejar errores (ej. el usuario cancela, problemas de configuración)
    die("Algo salió mal: " . $e->getMessage());
}
