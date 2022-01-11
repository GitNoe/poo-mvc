# CREACIÓN DE UN CMS CON EL MODELO VISTA-CONTROLADOR DESDE CERO

1. Creación del proyecto poo-mvc en laragon (blank)

2. Creación del árbol de directorios por terminal, se puede ver esta estructura con el comando "tree /f"
   - carpetas
   - archivos

3. Creación de un nuevo usuario y de la base de datos:
   - mysql -u root -p (entrar en root)
   - GRANT ALL PRIVILEGES ON *.* TO 'noelia'@'localhost' IDENTIFIED BY 'PassWord?!CMS1234'; (new user)
   - \q (salir)
   - mysql -u noelia -p (entrar en mi usuario)
   - CREATE DATABASE cms_hp; (base de datos creada)

4. Creación de tablas (código SQL):
   - USE cms_hp;

   - CREATE TABLE `usuarios` (
        `id` int(3) NOT NULL AUTO_INCREMENT,
        `usuario` varchar(16) NOT NULL,
        `contraseña` varchar(64) NOT NULL,
        `fecha_acceso` datetime DEFAULT NULL,
        `activo` tinyint(1) NOT NULL DEFAULT '0',
        `usuarios` tinyint(1) NOT NULL DEFAULT '0',
        `noticias` tinyint(1) NOT NULL DEFAULT '1',
        PRIMARY KEY (`id`),
        UNIQUE KEY `usuario` (`usuario`),
        UNIQUE KEY `id` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

   - CREATE TABLE `noticias` (
        `id` int(3) NOT NULL AUTO_INCREMENT,
        `titulo` varchar(32) NOT NULL DEFAULT '',
        `slug` varchar(36) DEFAULT '',
        `extracto` varchar(128) DEFAULT '',
        `texto` longtext,
        `activo` tinyint(1) NOT NULL DEFAULT '0',
        `home` tinyint(1) NOT NULL DEFAULT '0',
        `fecha` datetime DEFAULT NULL,
        `autor` varchar(64) DEFAULT NULL,
        `imagen` varchar(64) DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `id` (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

5. Edición de public/index.php: ver archivo completo (ver)
6. Edición de helper/DbHelper y helper/ViewHelper (ver)
7. Edición de model/usuario y model/noticia (ver)

8. Entrada por terminal de un texto largo para su guardado en la base de datos: (novas-bbdd.txt)
   - mysql> INSERT INTO noticias VALUES (texto); -> esto ya es parte de las vistas pero aún no sale
   - además también se añaden en la carpeta public/img los archivos que se utilizarán después

9. Entrada de algunos usuarios con contraseña: -> ¿¿ esto tendría que ir con UsuarioController ??
   - creamos un obtener-hash.php (ver archivo)
   - generamos las contraseñas hash desde el navegador modificando ese archivo
   - introducimos los datos en mysql:
      USE cms_hp;
      INSERT INTO usuarios VALUES
         (1,"admin","$2y$12$fBwo5bQI3wQTahYavREwNO3bPDGgEPnNDCItQu4yk6JyQ9Obg5qFS",null,1,1,1),
         (2,"operador1","$2y$12$8oFrQmRbE33zpIPFhF2wLeTdca0Q1AfANwZZangqz6NoltjzZepY.",null,1,0,1),
         (3,"operador2","$2y$12$KQ0GxzqLiMLGBzDbpFs8GupcoEm/oapUxPshhtbDFMGi4Eaj96NXO",null,0,0,1);
   - se habrán creado los usuarios en la base de datos

10. Edición de las vistas (públicas - front-end) (ver):
    - view/app/partials/header.php
    - view/app/partials/footer.php
    - view/app/index.php
    - view/app/acerca-de.php
    - view/app/noticias.php
    - view/app/noticia.php
    - public/css/app.css
    - public/js/app.js

11. Edición de controller/AppController (ver) -> funciones construct, index, acercade, noticias, noticia
12. Edición de controller/NoticiaController (ver) -> funciones construct, index, activar, home, borrar, crear, editar
13. Edición de controller/UsuarioController (ver) -> funciones construct, admin, entrar, salir, index, activar, borrar, crear, editar

14. ERROR: el index.php de public no encuentra la clase AppController a pesar de estar incluída y llamada con "use" - TRAS 5 DÍAS LO OBVIO Y SIGO AÑADIENDO CÓDIGO

15. Edición de las vistas no públicas (back-end) (ver):
    - view/admin/partials/header.php y view/admin/partials/footer.php (partials)
    - public/css/admin.css Y public/js/admin.js (public) - para usuarios y noticias
    - view/admin/usuarios/entrar.php
    - view/admin/usuarios/index.php
    - view/admin/usuarios/editar.php
    - view/admin/noticias/index.php
    - view/admin/noticias/editar.php
    - añadir function getSlug en ViewHelper

16. Conclusiones finales: el código está completo pero la página no va, se abre el directorio de carpetas del proyecto y al entrar en public sale el error de antes

## Cosas a probar cuando dea igual si rompe

- ALTER DATABASE nombre_bd CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_520_ci; (cambiar juego de caracteres en cotejamiento)
- if (!isset($_SERVER['REQUEST_URI']))
   {
       $_SERVER['REQUEST_URI'] = substr($_SERVER['PHP_SELF'],1 );
       if (isset($_SERVER['QUERY_STRING'])) { $_SERVER['REQUEST_URI'].='?'.$_SERVER['QUERY_STRING']; }
   }
(probado en index.php de public y no funciona)
- cambiar $_SERVER['REQUEST_URI'] por $input->url() en el index.php (tampoco funciona)
- function getRequestURL()
   {
      if (!isset($_SERVER['REQUEST_URI']) and isset($_SERVER['SCRIPT_NAME'])) {
         $_SERVER['REQUEST_URI'] = $_SERVER['index'];
         if (isset($_SERVER['QUERY_STRING']) and !empty($_SERVER['QUERY_STRING']))
               $_SERVER['REQUEST_URI'] .= '?' . $_SERVER['QUERY_STRING'];
         return $_SERVER['REQUEST_URI'];
      }
      return $_SERVER['REQUEST_URI'];
   }
   (tampoco funciona)
- require_once'index.php'; (nada)
