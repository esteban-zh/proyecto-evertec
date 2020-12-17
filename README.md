## Bienvenido al repositorio del reto evertec 2020-para desarrolladores junior

**Descripcion:**

Consiste en el desarrollo de una plataforma web estilo e-commerce, un sistema que hace posible la comercialización de productos o servicios de manera online, permitiendo pagos a traves de la plataforma [placetopay](https://www.placetopay.com/web/ "placetopay").
Ademas, dicho sistema, permite tambien el registro de productos, identificacion de usuarios y administracion de cuentas de clientes.

##Aplicacion:

**Herramientas, instalación y ejecucion:**

Para la ejecucion de este proyecto es necesario [php](https://www.php.net/ "php"), la instalacion de [composer](https://getcomposer.org/ "composer"), un servidor HTTP como [Apache](https://httpd.apache.org/ "Apache"), un servicio de base de datos como [MySQL](https://www.mysql.com/ "MySQL"), un administrador de bases de datos como [heidisql](https://www.heidisql.com/ "heidisql") o [phpMyAdmin](https://www.phpmyadmin.net/ "phpMyAdmin") y para las dependencias del frontend [Node.js](https://nodejs.org/en/ "Node.js").

luego de tener las herramientas necesarias se procede a instalar las dependencias del backend, del frontend y construccion de assets, ejecutando en una terminal de comandos:

_composer install_

_npm install_

_npm run dev_

se genera y configura archivo .env con las respectivas variables de entorno, base de datos, credenciales de mailtrap y de la pasarela de pagos placetopay, se ejectua:

_cp .env.example .env_

se crean y se llenan las tablas de migraciones de la base de datos:

_php artisan migrate --seed_

se tienen creados usuarios con contraseña predeterminados para pruebas del login y roles de usuario corriente y administrador.
se encuentran en el archivo **UserSeeder.php** de la carpeta database.

para correr la aplicacion en un navegador web se ejecuta:

_php artisan serve_

_npm run watch_
