<?php

if ($_POST['accion'] == 'crear') {
    //creara un nuevo registro en la BD
    require_once('../funciones/db.php');

    //validar entradas
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
    $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

    try { //prepare staments
        $statement = $conn->prepare("INSERT INTO contactos (nombre,empresa,telefono) VALUES(?,?,?)");
        $statement->bind_param("sss", $nombre, $empresa, $telefono); //s significa string y son 3 porque son 3 string si hubiera un int ssi
        $statement->execute();

        if ($statement->affected_rows == 1) {
            $respuesta = array(
                'respuesta' => 'correcto',
                
                'datos'=>array(
                    'nombre'=>$nombre,
                    'empresa'=>$empresa,
                    'telefono'=>$telefono,
                    'id_insertado' => $statement->insert_id
                )
            );
        }


        $statement->close();
        $conn->close();
    } catch (Exception $e) {
        $respuesta = array( //un arreglo es asociativo y lo pasamos a JSON
            'error' => $e->getMessage()
        );
    }
    echo json_encode($respuesta);
}
//echo json_encode($_POST)//JSON es un modelo de transporte permite la comunicacion entre diferentes lenguajes
//en PHP existen arreglos asociativos y en JS son objetos JSON los comunica
//JSON mejor y mas rapido y mas sencillo que XML
