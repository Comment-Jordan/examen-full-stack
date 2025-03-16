# Observaciones

Al momento de crear el proyecto de laravel acepte por error que me incorporara el historico de commits del repositorio de laravel por lo que mi proyecto se asocio con el repositorio de laravel dificultandome subir mis commits al repositorio personal, por lo que opte en crear una nueva carpeta de .git perdiendo el historico de mis commits dejando unicamente el commit final que contiene el proyecto concluido y listo para su revisión, de ante mano una disculpa

# TODO

- Filtros de búsqueda
- Mensajes flash

# Examen Full Stack

Este proyecto es un examen de desarrollo full stack. A continuación se describen los pasos para configurar y ejecutar el proyecto.

## Requisitos

- Laravel 11
- PHP 8.2 o superior
- Node.js 14 o superior
- Composer
- Inertia.js
- Vue 3
- Vuetify

## Instalación

1. Clona el repositorio en tu máquina local:
    ```bash
    git clone <URL_DEL_REPOSITORIO>
    ```

2. Navega al directorio del proyecto:
    ```bash
    cd examen-full-stack
    ```

3. Copia los archivos del proyecto a la carpeta `htdocs` de XAMPP:
    ```bash
    cp -r * c:/xampp_8.2/htdocs/examen-full-stack
    ```

4. Instala las dependencias de PHP usando Composer:
    ```bash
    composer install
    ```

5. Instala las dependencias de JavaScript usando npm:
    ```bash
    npm install
    ```

6. Inicia el gestor de base de datos MySql desde el panel de control de XAMPP.

## Uso

1. Ejecuta las migraciones de la base de datos:
    ```bash
    php artisan migrate
    ```

2. Inicia el servidor de desarrollo de Laravel:
    ```bash
    php artisan serve
    ```

3. Inicia el servidor de desarrollo de Vue:
    ```bash
    npm run dev
    ```

4. Abre tu navegador web y navega a `http://localhost:[número del puerto deseado generalmente 8000]`.

5. Sigue las instrucciones en pantalla para interactuar con la aplicación.

## Autor

- Nombre: [Jordan Pérez Bravo]
- GitHub: [https://github.com/Comment-Jordan]