<?php

class ConexionDB {
    private $conn;

    public function __construct() {
        $serverName = "163.178.107.130";
        $connectionInfo = array("Database" => "IF5100_Barrientos_Sandoval", "UID" => "sqlserver", "PWD" => "saucr.12");
        $this->conn = sqlsrv_connect($serverName, $connectionInfo);
        if(!$this->conn){
            die (print_r(sqlsrv_errors(), true));
        }
    }//CONSTRUCTOR

    public function conectar() {
        return $this->conn;   
    }//CONECTAR    
    
    public function cerrar(){
        mysqli_close($this->conn);
    }
}//CLASS CONEXIONDB

?>

