# Aplicación de Ficha de Cliente

Esta es una sencilla aplicación web para crear y guardar fichas de clientes. Utiliza HTML, JavaScript y PHP para comunicarse con una base de datos MySQL.

## Características

- Formulario para introducir el nombre, email y teléfono del cliente.
- Validación de campos en el frontend.
- Almacenamiento de los datos en una base de datos MySQL.
- Notificaciones dinámicas sobre el estado de la operación (éxito o error).

## Prerrequisitos

Para ejecutar esta aplicación, necesitarás:

- Un servidor web con soporte para PHP (por ejemplo, Apache, Nginx).
- PHP 8.0 o superior.
- Una base de datos MySQL o MariaDB.
- [Git](https://git-scm.com/) (para clonar el repositorio).

## Instalación

Sigue estos pasos para configurar el entorno de desarrollo local:

1.  **Clona el repositorio:**
    ```bash
    git clone https://github.com/basaconte/test1.git
    cd test1
    ```

2.  **Configura la base de datos:**
    - Crea una nueva base de datos en tu servidor MySQL.
    - Importa la estructura de la tabla `customers` utilizando el siguiente comando SQL:
      ```sql
      CREATE TABLE customers (
          id INT AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255) NOT NULL,
          email VARCHAR(255) NOT NULL,
          phone VARCHAR(50)
      );
      ```

3.  **Configura la conexión:**
    - Renombra o copia el archivo `db_config.php` y reemplaza los valores de las constantes con tus propias credenciales de la base de datos:
      ```php
      <?php
      define('DB_HOST', 'localhost');
      define('DB_USERNAME', 'tu_usuario');
      define('DB_PASSWORD', 'tu_contraseña');
      define('DB_NAME', 'tu_base_de_datos');
      ?>
      ```

4.  **Inicia el servidor:**
    - Mueve los archivos del proyecto al directorio raíz de tu servidor web (por ejemplo, `htdocs` en XAMPP o `www` en WAMP).
    - Alternativamente, puedes usar el servidor web incorporado de PHP para un desarrollo rápido:
      ```bash
      php -S localhost:8000
      ```

## Uso

1.  Abre tu navegador web y ve a la URL donde has alojado la aplicación (por ejemplo, `http://localhost/test1/` o `http://localhost:8000`).
2.  Rellena el formulario con los datos del cliente.
3.  Haz clic en "Guardar Cliente".
4.  Recibirás una notificación indicando si el cliente se ha guardado correctamente.
