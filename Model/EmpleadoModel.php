<?php

class EmpleadoModel {

    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion->conectar();
    }

//CONSTRUCTOR

    public function obtenerEmpleados() {
        $sql = "select * from Empleados";
        $stmt = sqlsrv_query($this->conn, $sql);
        if(!$stmt){
            die(print_r(sqlsrv_errors(), true));
        }
        
        print_r($stmt);
        echo($stmt);
        
        while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)){
            var_dump($row);
            echo($row);
            var_dump($row[0].$row[1] );
        }
        
        return $stmt;
    }

//INSERTARCOMENTARIO
}

//CLASS
?>
