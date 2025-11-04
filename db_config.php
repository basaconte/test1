<?php

// Para Heroku o entornos de producción que usan variables de entorno
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USERNAME', getenv('DB_USERNAME') ?: 'tu_usuario');
define('DB_PASSWORD', getenv('DB_PASSWORD') ?: 'tu_contraseña');
define('DB_NAME', getenv('DB_NAME') ?: 'tu_base_de_datos');

?>
