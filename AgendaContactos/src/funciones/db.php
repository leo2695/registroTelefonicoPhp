<?php
//credenciales base de datos

define('DB_USUARIO','root');
define('DB_PASSWORD','root');
define('DB_HOST','localhost');
define('DB_NOMBRE','contactos');

define('DB_PORT','3306');

//se nombra como yo quiera en vez de $conn
$conn=new mysqli(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE, DB_PORT); //antes era mysql pero ya no se usa, pdo(permite conectarse a 13+ bases distintas) y mysqli son mas utilizadas
//en ese orden siempre un 5 parametro seria el port


?>