<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7@8.3.0/framework7-bundle.min.css">
</head>
<body>
    <div id="app">
        <div class="view view-main view-init">
            <div class="page">
                <div class="navbar">
                    <div class="navbar-inner">
                        <div class="title">Inicio de Sesión</div>
                    </div>
                </div>
                <div class="page-content">
                    <div class="block-title">Por favor, introduce tus credenciales para iniciar sesión.</div>
                    <form action="auth.php" method="post" class="list form-store-data">
                        <input type="hidden" name="action" value="login">
                        <ul>
                            <li>
                                <div class="item-content item-input">
                                    <div class="item-inner">
                                        <div class="item-title item-label">Email</div>
                                        <div class="item-input-wrap">
                                            <input type="email" name="email" placeholder="Tu email" required validate>
                                            <span class="input-clear-button"></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="item-content item-input">
                                    <div class="item-inner">
                                        <div class="item-title item-label">Contraseña</div>
                                        <div class="item-input-wrap">
                                            <input type="password" name="password" placeholder="Tu contraseña" required validate>
                                            <span class="input-clear-button"></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="block block-strong row">
                            <button type="submit" class="col button button-fill">Iniciar Sesión</button>
                        </div>
                        <div class="block-footer">
                            <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>
                        </div>
                    </form>

                    <div class="block-title text-align-center">O inicia sesión con:</div>
                    <div class="block block-strong">
                        <a href="social_login.php?provider=Google" class="button button-fill button-large color-red">Iniciar Sesión con Google</a>
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