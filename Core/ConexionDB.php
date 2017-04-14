<?php

class ConexionDB {
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "");
        if (!$this->conn) {
            echo '<h2>FATAL ERROR: Imposible establecer '
            . 'conexi&oacuten con el servidor</h2>';
            exit;
        }//IF

        mysqli_select_db($this->conn, "ferreteria")
                or die("No se puede acceder a la base de datos");
    }//CONSTRUCTOR

    public function conectar() {
        return $this->conn;   
    }//CONECTAR    
    
    public function cerrar(){
        mysqli_close($this->conn);
    }
}//CLASS CONEXIONDB

?>

