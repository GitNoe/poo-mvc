~~<?php
echo password_hash("contraseña-usuario",  PASSWORD_BCRYPT, ['cost'=>12]) ?>
?>

<!-- para generar una contraseña hash se cambia "contraseña-usuario" por el nombre de cada uno que vayamos a introducir, 
desde el navegador se abre el archivo y se copia el hash generado, se copia en el comando que se utilizará 
para introducir los usuarios (INSERT INTO usuarios VALUES) y se ejecuta dicho comando dentro de mysql, creando 
así todos los usuarios con sus características y contraseña (¿que en este cao es igual al nombre de usuario?)-->

<!-- haciéndolo de esta siguiente forma se generan mediante programación, no una a una -->
<!-- <?php
// $password = $_POST['usuario'];
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);
// var_dump($hashed_password);
?> -->