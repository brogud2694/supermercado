<?php

class CategoriaModel {

    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion->conectar();
    }

//CONSTRUCTOR

    public function obtenerCategorias() {
        $query = mysqli_query(
                $this->conn, "call sp_obtener_todas_categorias()");
        $data = mysqli_fetch_all($query);
        mysqli_close($this->conn);
        return $data;
    }

//INSERTARCOMENTARIO
}

//CLASS
?>
