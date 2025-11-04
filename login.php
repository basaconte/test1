<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #f7f7f7; }
        .wrapper { width: 360px; padding: 20px; margin: 100px auto; background: #fff; border-radius: 5px; box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Inicio de Sesión</h2>
        <p>Por favor, introduce tus credenciales para iniciar sesión.</p>
        <form action="auth.php" method="post">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Iniciar Sesión">
            </div>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>
        </form>
    </div>    
</body>
</html>