# CREACIÓN DE UN CMS CON EL MODELO VISTA-CONTROLADOR DESDE CERO

1. Creación del proyecto poo-mvc en laragon (blank)

2. Creación del árbol de directorios por terminal, se puede ver esta estructura con el comando "tree /f"
   - carpetas
   - archivos

3. Creación de un nuevo usuario y de la base de datos:
   - mysql -u root -p (entrar en root)
   - GRANT ALL PRIVILEGES ON *.* TO 'user'@'localhost' IDENTIFIED BY 'password'; (new user)
   - \q (salir)
   - mysql -u user -p (entrar en mi usuario)
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

8. Entrada por terminal de un texto largo para su guardado en la base de datos: (noticias-bbdd.txt)
   - mysql> INSERT INTO noticias VALUES (texto); -> esto ya es parte de las vistas pero aún no sale
   - además también se añaden en la carpeta public/img los archivos que se utilizarán después

9. Entrada de algunos usuarios con contraseña:
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

14. ERROR: el index.php de public no encuentra la clase AppController a pesar de estar incluída y llamada con "use"

15. Edición de las vistas no públicas (back-end) (ver):
    - view/admin/partials/header.php y view/admin/partials/footer.php (partials)
    - public/css/admin.css Y public/js/admin.js (public) - para usuarios y noticias
    - view/admin/usuarios/entrar.php
    - view/admin/usuarios/index.php
    - view/admin/usuarios/editar.php
    - view/admin/noticias/index.php
    - view/admin/noticias/editar.php
    - añadir function getSlug en ViewHelper

16. Conclusiones finales: el código está completo pero la página no va, se abre el directorio de carpetas del proyecto y al entrar en public da un error de Not Found

17. Se han modificado las rutas de los archivos de view/app, incluyendo la carpeta public previa, y sale una página de front-end pero las rutas entre achivos siguen sin ir

18. A pesar de que la aplicación no funciona bien (imagino que falta corregir más rutas), he añadido una página de Contacto a mayores:
    - Creando la función en AppController
    - Añadiendo un case "contacto" en el index.php de public
    - Añadiendo la ruta en el menú de header.php (app)
    - Creando un contacto.php en la carpeta app
    - La página se ha creado y hay un enlace a ella en el menú, pero como con el resto de rutas da un error: "Not Found. The requested URL was not found on this server."

19. Tras repasar varias veces el código y reiniciar laragon otras tantas, ha decidido funcionar y por fin se ven todas las páginas del menú completas.

20. Intento de entrar en el panel de administración con el usuario admin creado anteriormente -> acceso concedido
    - Se pueden ver las páginas de inicio, noticias (con posibilidad de crearlas y modificarlas) y usuarios
    - He tenido que modificar rutas en la carpeta admin también para que se muestre el css y js
    - Creación de dos noticias desde este panel de administración (reliquias de la muerte y sombrero seleccionador), y activación de la misma

21. Por último, se tiene que añadir en la página de Contacto un formulario de Registro sacado de [aquí](https://www.w3schools.com/howto/howto_js_form_steps.asp)
    - Añado el código html en contacto.php
    - Creo contact.css y contact.js y añado el código correspondiente de cada uno
    - Va bien (aunque los datos no irían a ningún sitio al final del formulario ya que no hay un action_page.php que los recoja)

### Nota:

Durante todo el proceso de creación, modificación y actualización de este proyecto se han realizado acciones en terminal para su control de versiones, comenzando con un "git init" y periódicamente con "git add ." y "git commit". De esta forma los cambios se han ido guardando en el repositorio de Github.
