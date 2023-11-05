<?php 

session_start();

class Transaccion {
    public $fecha;
    public $cuentaCliente;
    public $noTransaccion;
    public $monto;
    public $tipo;
    public $usuario;
    
    
    // Constructor de la clase
    public function __construct($fecha, $cuentaCliente, $noTransaccion, $monto, $tipo, $usuario) {
        $this->fecha = $fecha;
        $this->cuentaCliente = $cuentaCliente;
        $this->noTransaccion = $noTransaccion;
        $this->monto = (float)$monto;
        $this->tipo = $tipo;
        $this->usuario=$usuario;
    }
    
    
    
}

