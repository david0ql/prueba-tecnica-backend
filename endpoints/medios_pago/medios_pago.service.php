<?php
include("../../clases/medios_pago.php");
include("../../clases/respuesta.php");
function get($conexion){

$sql = $conexion->prepare("SELECT * FROM medios_pago");
$sql->execute();
$result = $sql->get_result();
while($row = mysqli_fetch_array($result)){
    $obj = new MediosPago($row);
    $arr[] = $obj;
}
$respuesta = new Respuesta($arr);
echo json_encode($respuesta);

}

function post($conexion){

    @$name = $_POST['name'];

    if ($name != "") {
        $sql = $conexion->prepare("INSERT INTO medios_pago (nombre) VALUES (?)");
        $sql->bind_param('s', $name);
        $sql->execute();
        $response = $sql->get_result();
        echo json_encode(!$response);
    }else {
        echo json_encode("No hay nombre");
    }

}

function put($conexion){

    $name = $_GET['name'];
    $id_medio_pago = $_GET['id_medio_pago'];

    if ($id_medio_pago != "" && $name != "") {
        $sql = $conexion->prepare("UPDATE medios_pago SET nombre = ? WHERE id_medio_pago = ?");
        $sql->bind_param('si', $name, $id_medio_pago);
        $sql->execute();
        $response = $sql->get_result();
        echo json_encode(!$response);
    }else{
        echo json_encode("No hay id");
    }

}

function delete($conexion){

    $id_medio_pago = $_GET['id_medio_pago'];

    if ($id_medio_pago != "") {
        $sql = $conexion->prepare("DELETE FROM medios_pago WHERE id_medio_pago = ?");
        $sql->bind_param('i', $id_medio_pago);
        $sql->execute();
        $response = $sql->get_result();
        echo json_encode(!$response);
    }else{
        echo json_encode("No hay id");
    }

}

function noMethod(){
    echo json_encode("method error");
}
