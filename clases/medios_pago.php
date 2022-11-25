<?php
class MediosPago{

    public $id_medio_pago;
    public $nombre;

    public function __construct($args = []) {
        $this->id_medio_pago = $args["id_medio_pago"];
        $this->nombre = $args["nombre"];
    }
}
?>