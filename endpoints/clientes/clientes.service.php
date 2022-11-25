<?php
include("../../clases/clientes.php");
include("../../clases/respuesta.php");

function get($conexion){

$sql = $conexion->prepare("SELECT 
clientes.*,
condiciones_pago.id_condicion_pago as id_condicion_pago,
condiciones_pago.nombre as condicion_pago,
medios_pago.id_medio_pago as id_medio_pago,
medios_pago.nombre as medio_pago 
FROM clientes
INNER JOIN condiciones_pago ON condiciones_pago.id_condicion_pago = clientes.id_condicion_pago
INNER JOIN medios_pago ON medios_pago.id_medio_pago = clientes.id_medio_pago");

$sql->execute();
$result = $sql->get_result();
while($row = mysqli_fetch_array($result)){
    $obj = new Clientes($row);
    $arr[] = $obj;
}
$respuesta = new Respuesta($arr);
echo json_encode($respuesta);

}

function post($conexion){
    $_POST = json_decode(file_get_contents('php://input'), true);
    @$documento = $_POST['documento'];
    @$nombre = $_POST['nombre'];
    @$primer_apellido = $_POST['primer_apellido'];
    @$segundo_apellido	 = $_POST['segundo_apellido'];
    @$direccion = $_POST['direccion'];
    @$telefono = $_POST['telefono'];
    @$correo = $_POST['correo'];
    @$ciudad = $_POST['ciudad'];
    @$id_condicion_pago = $_POST['id_condicion_pago'];
    @$valor_cupo = $_POST['valor_cupo'];
    @$id_medio_pago = $_POST['id_medio_pago'];
    @$estado = $_POST['estado'];

    if ($documento != "") {
        $sql = $conexion->prepare("INSERT INTO clientes (documento, nombre, primer_apellido, segundo_apellido, direccion, telefono, correo, ciudad, id_condicion_pago, valor_cupo, id_medio_pago, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('ssssssssssss', $documento, $nombre, $primer_apellido, $segundo_apellido, $direccion, $telefono, $correo, $ciudad, $id_condicion_pago, $valor_cupo, $id_medio_pago, $estado);
        $sql->execute();
        $response = $sql->get_result();
        echo json_encode(!$response);
    }else {
        echo json_encode("No hay nombre");
    }

}

function put($conexion){
    $_PUT = file_get_contents('php://input');
    $json = json_decode($_PUT, true);
    @$documento = $json['documento'];
    @$nombre = $json['nombre'];
    @$primer_apellido = $json['primer_apellido'];
    @$segundo_apellido	 = $json['segundo_apellido'];
    @$direccion = $json['direccion'];
    @$telefono = $json['telefono'];
    @$correo = $json['correo'];
    @$ciudad = $json['ciudad'];
    @$valor_cupo = $json['valor_cupo'];
    @$estado = $json['estado'];
    @$id_cliente = $json['id_cliente'];

    if ($nombre != "" && $documento != "") {
        $sql = $conexion->prepare("UPDATE clientes SET documento = ?, nombre = ?, primer_apellido = ?, segundo_apellido = ?, direccion = ?, telefono = ?, correo = ?, ciudad = ?, valor_cupo = ?, estado = ? WHERE id_cliente = ?");
        $sql->bind_param('ssssssssssi', $documento, $nombre, $primer_apellido, $segundo_apellido, $direccion, $telefono, $correo, $ciudad, $valor_cupo, $estado, $id_cliente);
        $sql->execute();
        $response = $sql->get_result();
        file_put_contents("idk.txt", $response);
        echo json_encode(!$response);
    }else{
        echo json_encode("No hay id");
    }

}

function delete($conexion){

    $id_cliente = $_GET['id_cliente'];

    if ($id_cliente != "") {
        $sql = $conexion->prepare("DELETE FROM clientes WHERE id_cliente = ?");
        $sql->bind_param('i', $id_cliente);
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
