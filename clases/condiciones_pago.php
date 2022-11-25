<?php
class CondicionesPago{
    
    public $id_condicion_pago;
    public $nombre;

    public function __construct($args = []) {
        $this->id_condicion_pago = $args["id_condicion_pago"];
        $this->nombre = $args["nombre"];
    }
}
?>