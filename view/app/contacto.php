<h3><a href="<?php echo $_SESSION['home'] ?>" title="Inicio">Inicio</a> <span>| Acerca de</span></h3>

<div class="row">
    <i class="large material-icons">info_outline</i>
    <p>Esta página muestra el contacto con el universo de Harry Potter</p>
    <p>Comparte tus datos mágicos con el colegio Howarts de Magia y Hechicería</p>
    <form action="" method="post">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        <input type="email" name="correo" id="correo" placeholder="Email">
        <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
        <button type="submit">Enviar</button>
    </form>
</div>