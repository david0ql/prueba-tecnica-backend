<?php

include( "medios_pago.service.php" );
include("../conexion/conexion.php");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        //Listar
        get($conexion);
        break;
    case 'POST':
        //insertar
        post($conexion);
        break;
    case 'PUT':
        //Actualizar
        put($conexion);
        break;
    case 'DELETE':
        //eliminar
        delete($conexion);
        break;
    default:
       //Ningun metodo concuerda
        noMethod();
        break;
}
