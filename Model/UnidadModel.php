<?php

class UnidadModel {

    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion->conectar();
    }

//CONSTRUCTOR

    public function obtenerUnidades() {
        $query = mysqli_query(
                $this->conn, "call sp_obtener_todas_unidades()");
        $data = mysqli_fetch_all($query);
        mysqli_close($this->conn);
        return $data;
    }

}

//CLASS
?>
