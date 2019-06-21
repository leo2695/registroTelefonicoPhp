<!DOCTYPE html>
<html lang="es">


<?php include 'presentation/head.php' ?>

<?php include 'presentation/header.php' ?>

<?php include 'funciones/consultas.php' ?>

<body>
    <div class="bg-amarillo contenedor sombra">

        <form id="contacto" action="#">

            <legend>Agregar contacto
                <span>Todos los campos son requeridos</span>
            </legend>

            <?php include 'presentation/formulario.php' ?>
        </form>
        <div class="bg-blanco contenedor sombra contactos">
            <div class="contenedor-contactos">
                <h2>Contactos</h2>

                <input type="text" id="buscar" class="buscador sombra" placeholder="Busqueda">

                <p class="total-contactos"><span>2 </span>Contactos</p>
                <div class="contenedor-tabla">
                    <table id="listaContactos" class="listaContactos">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Empresa</th>
                                <th>Teléfono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $contactos = obtenerContacto();

                            if ($contactos->num_rows) {
                                foreach ($contactos as $contacto) { ?>
                                    <tr>
                                        <pre>
                                         <?php   var_dump($contacto);?>
                                        </pre>

                                        <td><?php echo $contacto['nombre']; ?></td>
                                        <td><?php echo $contacto['empresa']; ?></td>
                                        <td><?php echo $contacto['telefono']; ?></td>


                                        <td>
                                            <a href="editar.php?id=<?php echo $contacto['id']; ?>" class="btn btn-editar">
                                                <i class="far fa-edit"></i></a>
                                            <button type="button" data-id="<?php echo $contacto['id']; ?>" class="btn btn-borrar">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php  }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
</body>

<?php include 'presentation/footer.php'; ?>

</html>