<?php
class Clientes{
    public $id_cliente;
    public $documento;
    public $nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $direccion;
    public $telefono;
    public $correo;
    public $ciudad;
    public $id_condicion_pago;
    public $condicion_pago;
    public $valor_cupo;
    public $id_medio_pago;
    public $medio_pago;
    public $estado;
    public $fecha_registro;

    public function __construct($args = []) {
        $this->id_cliente = $args["id_cliente"];
        $this->documento = $args["documento"];
        $this->nombre = $args["nombre"];
        $this->primer_apellido = $args["primer_apellido"];
        $this->segundo_apellido = $args["segundo_apellido"];
        $this->direccion = $args["direccion"];
        $this->telefono = $args["telefono"];
        $this->correo = $args["correo"];
        $this->ciudad = $args["ciudad"];
        $this->id_condicion_pago = $args["id_condicion_pago"];
        $this->condicion_pago = $args["condicion_pago"];
        $this->valor_cupo = $args["valor_cupo"];
        $this->id_medio_pago = $args["id_medio_pago"];
        $this->medio_pago = $args["medio_pago"];
        $this->estado = $args["estado"];
        $this->fecha_registro = $args["fecha_registro"];
    }
}
?>