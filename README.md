E-Commerce en Laravel
=====================

Este es un proyecto de **E-Commerce** desarrollado en **Laravel**, un framework de PHP, para la creación de tiendas en línea modernas y escalables.

📌 Características
------------------

-   🛒 Sistema de autenticación de usuarios (registro e inicio de sesión).

-   🏷️ Gestión de productos con imágenes, precios y descripciones.

-   🛍️ Carrito de compras y sistema de pedidos.

🔧 Requisitos
-------------

-   **PHP 8** o superior.

-   **Composer** instalado.

-   **MySQL** o cualquier otro sistema de base de datos compatible.

-   **Laravel 10** o superior.

🚀 Instalación y ejecución
--------------------------

1.  Clona este repositorio o descarga los archivos:

    ```
    git clone https://github.com/tuusuario/ecommerce-laravel.git
    cd ecommerce-laravel
    ```

2.  Instala las dependencias con Composer:

    ```
    composer install
    ```

3.  Copia el archivo de configuración:

    ```
    cp .env.example .env
    ```

4.  Genera la clave de la aplicación:

    ```
    php artisan key:generate
    ```

5.  Configura la base de datos en el archivo `.env`.

6.  Ejecuta las migraciones para crear las tablas:

    ```
    php artisan migrate
    ```

7.  Inicia el servidor de desarrollo:

    ```
    php artisan serve
    ```

8.  Accede a la aplicación desde tu navegador en `http://127.0.0.1:8000`.

Uso
------

-   Regístrate o inicia sesión para comenzar a comprar.

-   Explora los productos y agrégalos al carrito.

-   Procede al checkout y realiza tu compra.

Capturas de pantalla
-----------------------

<img width="688" alt="image" src="https://github.com/user-attachments/assets/d33fb169-3f43-483c-9d9e-a3b8f154735a" />


Mejoras futuras
------------------

-   🖥️ Desarrollo de un **frontend más moderno** utilizando Vue.js o React.

-   💳 Integración con **pasarelas de pago** para mayor flexibilidad.

-   ⚙️ Implementación de un **panel de administración** para gestionar productos, pedidos y usuarios.

-   🎨 Diseño **más atractivo y optimizado para móviles**.

👨‍💻 Autor
-----------

-   [Gabriela Granda] - [@gaabrielagranda](https://github.com/gaabrielagranda))
