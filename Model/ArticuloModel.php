<?php

class ArticuloModel {

    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion->conectar();
    }

//CONSTRUCTOR

    public function insertarArticulo($nombre, $precio, $descripcion, $unidad, $categorias, $numeroCategorias) {
        $query = mysqli_query(
                $this->conn, "CALL sp_insertar_articulo"
                . "('$nombre','$precio', '$descripcion', '$unidad', '$categorias', '$numeroCategorias');");
        if ($query) {
            mysqli_close($this->conn);
            return TRUE;
        } else {
            mysqli_close($this->conn);
            return false;
        }//IF 
    }
}

//CLASS
?>
