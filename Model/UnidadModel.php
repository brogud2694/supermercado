<?php

class UnidadModel {

    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion->conectar();
    }

//CONSTRUCTOR

    public function obtenerUnidades() {
        
        $sql = "call sp_obtener_todas_unidades()";
        $stmt = sqlsrv_prepare($this->conn, $sql);
        if(!$stmt){
            die(print_r(sqlsrv_errros(), true));
        }
        var_dump($stmt);
        $row = sqlsrv_fetch_array($stmt);
        var_dump($row);
        
        return $stmt;
    }
}

//CLASS
?>
