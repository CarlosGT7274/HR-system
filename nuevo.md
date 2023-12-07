# Documentación del programador

En este artículo encontraras lo necesario para abordar el proyecto de la mejor manera

## Tecnologías Utilizadas

A continuación se encuentran todas las tecnologías utilizadas en el proyecto junto con su propósito y un enlace a su documentación oficial.

| Tecnología   | Uso                                                             | Documentación Oficial                                     |
| :----------: | :-------------------------------------------------------------: | :-------------------------------------------------------: |
| `PHP`        | Principal lenguaje de programación                              | [Click aquí](https://www.php.net/manual/es/index.php)     |
| `Laravel`    | Framework utilizado para el front-end y back-end                | [Click aquí](https://laravel.com/docs/10.x)               |
| `Blade`      | Gestor de vistas junto con HTML, CSS y JS                       | [Click aquí](https://laravel.com/docs/10.x/blade)         |
| `Tailwind`   | Librería de CSS para escribir estilos inline                    | [Click aquí](https://tailwindcss.com/docs/installation)   |
| `JavaScript` | Para añadirle interactividad a las vistas                       | [Click aquí](https://www.w3schools.com/jsrEF/default.asp) |
| `Vite`       | Para gestionar los includes en las vistas                       | [Click aquí](https://vitejs.dev/guide/)                   |
| `NPM`        | Gestor de paquetes de JavaScript                                | [Click aquí](https://www.npmjs.com/)                      |
| `Composer`   | Gestor de paquetes de Laravel                                   | [Click aquí](https://getcomposer.org/doc/)                |
| `JWT`        | Token de seguridad para acceder al API mediante una librería    | [Click aquí](https://jwt-auth.readthedocs.io/en/develop/) |
| `SQL`        | Para la creación de la Base de Datos                            | [Click aquí](https://dev.mysql.com/doc/refman/8.0/en/)    |
| `Xampp`      | Gestión y acceso de la Base de datos mediante un servidor local | [Click aquí](https://www.apachefriends.org/es/index.html) |

## Estructura de carpetas

### Vistazo General

```plain
├── 📂 app
|   ├── 📁 Http
|   |   ├── 📁 Controllers
|   |   |   ├── 📁 API
|   |   |   ├── 📁 Pages
|   |   |   └── 📄 Controller.php
|   |   |  
|   |   ├── 📁 Middleware
|   |   └── 📄 Kernel
|   |   
|   ├── 📁 Mail
|   ├── 📁 Models
|   |   ├── 📁 ATT
|   |   ├── 📁 HR
|   |   ├── 📁 SYS
|   |   └── 📄 modeloBase.php
|   |
|   ├── 📁 Providers
|   └── 📁 ...
|
├── 📂 bootstrap
|   ├── 📁 cache
|   └── 📄 app.php
|
├── 📁 config
├── 📁 db
├── 📂 documentation
├── 📂 node_modules
|   ├── 📁 Librerías de JavaScript
|   └── 📁 ...
|
├── 📂 public
├── 📂 resources
|   ├── 📁 css
|   ├── 📁 icons
|   ├── 📁 js
|   ├── 📁 lang
|   └── 📁 views
|
├── 📁 routes
├── 📂 storage
├── 📁 tests
├── 📂 vendor
|   ├── 📁 Librerías de PHP
|   └── 📁 ...
|
├── 📄 .env
├── 📄 .env.example
├── 📄 composer.json
├── 📄 package.json
├── 📄 tailwind.config.js
├── 📄 vite.config.js
└── 📄 ... archivos de configuración extras ...
```

### Carpeta Controllers

Dentro de la carpeta controller se encuentran los archivos del relacionados al API y al front-end donde se hace el procesamiento de datos.

En el caso del API se realizan las operaciones relacionadas con la **base de datos**.

En el front-end se realizan las operaciones de **comunicación entre el API** y el front y se decide que **vista se debe mostrar** al usuario

Varias operaciones generales se realizan mediante funciones en el `Controller.php` del cual extienden todos los demás controladores, como las request al API que se resuelven de manera interna, así como el cambio de nombres en parámetros de una request.

#### API

La carpeta API tiene la siguiente estructura en su interior:

```plain
├── 📁 HR
├── 📂 SYS
|
├── 📄 DashboardController.php
└── 📄 SimpleCRUDController.php
```

Es importante mencionar que casi todas las operaciones son realizadas mediante el `SimpleCRUDController`, el cual es un controlador general. Todos los demás controladores realizan operaciones más específicas o aunque de igual forma incluyen un CRUD para la tabla principal.

La carpeta HR contiene los archivos que controlan las operaciones relacionadas a las tablas de la sección de HR. La carpeta de SYS son los controladores relacionados a las tablas del sistema.

#### Pages

Bajo esta carpeta se encuentran todos los controladores para la gestión de las vistas y conexión al API
