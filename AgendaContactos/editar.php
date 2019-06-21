<!DOCTYPE html>
<html lang="es">

<?php include 'presentation/head.php' ?>

<div class="contenedor-barra">
    <div class="contenedor barra">
        <a href="index.php" class="btn volver">Volver</a>
        <h1> Editar Contacto</h1>
    </div>
</div>

<body>
<div class="bg-amarillo contenedor sombra">
    <form id="contacto" action="#">
        <legend>Editar un Contacto<span>Todos los campos son obligatorios</span></legend>
   
        <?php include 'presentation/formulario.php' ?>
    </form>
</div>
</body>

<?php include 'presentation/footer.php'; ?>

</html>