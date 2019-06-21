const formularioContactos = document.querySelector('#contacto');
const listadoContactos=document.querySelector('#listaContactos tbody');
eventListener();

function eventListener() {
    //Cuando el form de crear o editar contacto
    formularioContactos.addEventListener('submit', leerForm);
}

function leerForm(e) { //e es el evento
    e.preventDefault(); //se recomienda cuando se vaya hacer una operacion 
    //con JS o AJAX

    //Leer los datos inputs
    const
        nombre = document.querySelector('#nombre').value,
        accion = document.querySelector('#accion').value,
        empresa = document.querySelector('#empresa').value,
        telefono = document.querySelector('#telefono').value;

    if (nombre === '' || empresa === '' || telefono === '') { //en JS se recomienda 3 =
        //2 parametros: texto y clase
        notificacionPantalla('Todos los Campos son Obligatorios', 'error');
    } else { //si pasa la validacion
        //Crear llamado a AJAX

        const infoContacto = new FormData(); //FormData es la mejor forma para leer datos de un formulario
        infoContacto.append('nombre', nombre);
        infoContacto.append('empresa', empresa);
        infoContacto.append('telefono', telefono);
        infoContacto.append('accion', accion);

        //    console.log(...infoContacto); //para ver si los datos se estan tomando correctamente porque FormData no accede directamente a ellos

        if (accion === 'crear') {
            //Crear contacto
            insertarBD(infoContacto);
        } else {
            //Editar el contacto
        }
    }
}
/*
//Inserta en la Base de Datos via AJAX
function insertarBD(datos) {
    //llamado Ajax
    //crear objeto
    const xhr = new XMLHttpRequest(); //xhr siempre se usa para ajax
    //abrir conexion
    xhr.open('POST', 'src/modelos/modelo-contacto.php', true); //primero el metodo POST(cuando quiero obtener algo de un formulario) o Get(cuando quiero obtener algo del servidor), la direccion del modelo, llamado asincrono 
    //pasar datos
    xhr.onload = function () {
        if (this.status === 200) {//si todo sale bien
console.log(JSON.parse(xhr.responseText)); //JSON es un metodo de transporte JSON.parse para convertirlo de string a JSON (un objeto que JS puede acceder a sus valores)
//leer respuesta
const respuesta=JSON.parse(xhr.responseText); 

//insertar elemento a la tabla
const nuevoContacto=document.createElement('tr');

// comillas raras ``
//el orden importa
nuevoContacto.innerHTML=` 
<td>
${respuesta.datos.nombre}
</td>
<td>
${respuesta.datos.empresa}
</td>
<td>
${respuesta.datos.telefono}
</td>
`;

//contendor pra botones editar y borrar
const contenedorAcciones=document.createElement('td');

//crear el icono editar
const iconoEditar=document.createElement('i');
iconoEditar.classList.add('far','fa-edit');

//crea el enlace para editar
const btnEditar=document.createElement('a');
btnEditar.appendChild(iconoEditar);
btnEditar.href=`editar.php?id=${respuesta.datos.id_insertado}`;
btnEditar.classList.add('btn', 'btn-editar');

//agregarlo al padre
contenedorAcciones.appendChild(btnEditar);

//Icono eliminar
const iconoEliminar=document.createElement('i');
iconoEliminar.classList.add('fas','fa-trash-alt');

//Crear el boton de eliminar
const btnEliminar=document.createElement('button');
btnEliminar.appendChild(iconoEliminar);
btnEliminar.setAttribute('data-id', respuesta.datos.id_insertado);
btnEliminar.classList.add('btn','btn-borrar');
contenedorAcciones.appendChild(btnEliminar);

//Agregar al TR
nuevoContacto.appendChild(contenedorAcciones);

//agregar con los contactos
listaContactos.appendChild(nuevoContacto);

//resetear el form
document.querySelector('form').reset();
//mostrar notificacion
notificacionPantalla('Contacto Creado','correcto');
}
    }
    //enviar datos
    xhr.send(datos)
}
*/
//Notificacion en Pantalla
function notificacionPantalla(mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    //Formulario
    formularioContactos.insertBefore(notificacion, document.querySelector('form legend'));
    //Ocultar y Mostrar Notificacion
    setTimeout(() => { //En vez de poner function se pone =>{}
        notificacion.classList.add('visible');

        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500);
        }, 3000);
    }, 100)
}