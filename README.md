# Recomendado:
* Documentacion de Laravel
* Laracasts.com

# Pasos para el Proyecto:
## Preparacion
1. Chequear los requerimientos. Yo en particular uso Ampps para el servidor y ya tengo instalado Composer
2. - `composer global require "laravel/installer"`:

   Baja el 'instalador' de laravel que nos va a permitir crear proyectos

3. `laravel new laravel-demo` / `composer create-project --prefer-dist laravel/laravel laravel-demo` (sin bajar el instalador):

   Crea una carpeta con el nombre del proyecto y todo lo requerido por el ultimo Laravel, incluidas dependencias de composer
   Automaticamente se hace el php artisan key:generate, si por alguna razon no se hizo entonces: 
   If the application key is not set, your user sessions and other encrypted data will not be secure!

4. Ya tenemos una aplicacion base, ahora podemos usar php artisan serve para levantarla en localhost:8000
5. Configurar en AMPPS, en Ampps podemos crear la base de datos y configurar una url para el proyecto

    Ampps va a necesitar permisos de administrador para editar el archivo hosts de windows

6. Abrir .env y configurar las variables para nuestro entorno:

    - APP_NAME
    - APP_URL
    - DB_*
    - MAIL_* (si es que lo vamos a usar)
    - Las demas cosas las vamos a ignorar para la demo. 
    - *Como nota adicional, también recomendamos cambiar el .env.example si hay alguna cosa que debería quedar (APP_NAME) o si se agregan/quitan variables*

## Lo que tenemos

Si levantamos el proyecto ahora vamos a ver una página inicial de Laravel por defecto que te muestra links de interes.

Veamos como funciona:

- Una vez que se hace un request a alguna ruta, se va a la carpeta `routes` y al archivo `web.php`
- En este archivo se ven las rutas registradas de nuestro proyecto, si la ruta no se encuentra entonces Laravel muestra un 404 por defecto
    - Si se quiere se puede cambiar la página de error por defecto
- Aquí encontramos la ruta '/' que tiene un callback que retorna `view('welcome')`
- La funcion view devuelve el resultado del archivo `resources/views/welcome.blade.php`
- Blade es el sistema de templates que viene con Laravel, lo que hace es facilitarnos el uso de php para poder mostrarlo en el HTML
- Si revisamos en este momento `welcome.blade.php` podemos ver que tiene HTML común, aunque encontramos las directivas de blade @auth, @else y @endauth
- Estas directivas se usan para chequear si el usuario está autenticado o no, cosas como estás son las que nos van a ayudar
- Tambien podemos ver que se usa {{ app()->getLocale() }}, las llaves le indican a blade que tiene que correr lo que hay dentro y poner el resultado en el html

## Usuarios

En la parte anterior vimos que en `welcome.blade.php` se está chequeando si el usuario está logueado, pero todavía no tenemos sistema de autenticación ni usuarios.

Para empezar a tener un sistema podemos correr `php artisan make:auth`, este comando va a crear más vistas (archivos de blade), un HomeController y rutas en `web.php`.

- Rutas
    - /home

        Ahora en vez de usar un callback en el mismo archivo se referencia a el controlador `HomeController` en la funcion `index` y se le pone un nombre a la ruta

    - Auth::routes()

        Este metodo registra todas las rutas por defecto para la autenticacion base de Laravel como por ejemplo las de `login` y `register`

- Vistas creadas:
    - app.blade.php
        
        Un layout básico del que van a extender las demás vistas para poder mostrarse, va a ser la base de todas las demás vistas de nuestro proyecto

    - login, register, reset, email:

        Formularios de Login, Registro y Reseteo de contraseña para los usuarios

    - home

        Vista a donde se redirige el usuario luego del login

- HomeController 

    Lo primero que vemos es que en el constructor dice lo siguiente `$this->middleware('auth')` esto hace que cualquier persona que quiera llegar a una funcion de este controlador debe estar autenticada.

    Después está la funcion `index` que simplemente devuelve la vista `home`

Ya tenemos la autenticación hecha, lo siguiente que vamos a necesitar es crear las tablas en la base de datos para nuestros usuarios.

Para esto usamos el comando `php artisan migrate`, esto va a crear las tablas para usuarios y los reseteos de contraseñas.

Con esto hecho ya podemos registrarnos y loguearnos.

## MVC
#### Model, View, Controller

En esta parte vamos a hacer que los Usuarios puedan crear/editar/eliminar Posts

- `php artisan make:model Post` 
    
    Se le puede agregar el parámetro **-m** para ya crear la migracion

- `php artisan make:migration create_posts_table --create=posts` 

    Agregamos el parametro **--create** para que ya se genere un boilerplate para crear la tabla

- `php artisan make:controller PostsController --model=Post --resource` 

    El parametro **--resource** es para que ya se generen metodos de crear/guardar, editar/actualizar, ver y eliminar

Nuestros Posts van a tener título, contenido y un usuario como creador. 

Para esto vamos a la migracion que acabamos de crear `create_posts_table` y agregamos las columnas