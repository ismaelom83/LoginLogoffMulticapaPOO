

<p> <?php echo $sUsuario ?> Bienvenido a la aplicacion LOginLogoffMulticapaPOO</p>
<p>Tu perfil es (<?php echo $sPerfil ?>)</p>
<p>  <?php echo $salidaConexion ?> </p>
<p> <?php echo $salidaUltimaConexion ?> </p>
<br>
<br>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>?pagina=inicio" method="post">
    <input type="submit" class="btn btn-danger" value="Cerrar Sesion" name="salir">
</form>

<?php

