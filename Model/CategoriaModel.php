<?php

class CategoriaModel {

    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion->conectar();
    }

    public function insertarCategoria($categoria) {

        $sql = "EXEC SP_INSERTAR_CATEGORIA ?";
        $params = array($categoria->getNombre());
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        if (!$stmt) {
            die(print_r(sqlsrv_errors(), true));
        }

        $rows_affected = sqlsrv_rows_affected($stmt);

        if ($rows_affected === false) {
            die(print_r(sqlsrv_errors(), true));
        } elseif ($rows_affected == -1) {
            echo "No information available.<br />";
        } else {
            echo $rows_affected . " rows were updated.<br />";
        }

        sqlsrv_free_stmt($stmt);
    }

    public function obtenerCategorias() {
        $sql = "select * from Categoria";
        $stmt = sqlsrv_query($this->conn, $sql);
        if (!$stmt) {
            die(print_r(sqlsrv_errors(), true));
        }

        $result = array();
        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_NUMERIC)) {
            $categoria = new Categoria();
            $categoria->setIdCategoria($row['0']);
            $categoria->setnombre($row['1']);
            array_push($result, $categoria);
        }

        sqlsrv_free_stmt($stmt);
        return $result;
    }

    public function borrarCategoria($categoria) {
        $sql = "DELETE CATEGORIA WHERE idCategoria = ?";
        $params = array($categoria->getIdCategoria());
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        if ($stmt === false) {
            if (($errors = sqlsrv_errors() ) != null) {
                foreach ($errors as $error) {
                    if ($error['code'] === MSSQL_FK_ERR) {
                        sqlsrv_free_stmt($stmt);
                        return MSSQL_FK_ERR;
                    }
                }
            }
        }

        $rows_affected = sqlsrv_rows_affected($stmt);

        if ($rows_affected === false) {
            echo $rows_affected . " rows were updated.<br />";
        }

        sqlsrv_free_stmt($stmt);
    }

    public function actualizarCategoria($categoria, $nombre) {
        $sql = "UPDATE CATEGORIA SET NAME = ? WHERE idCategoria = ?";
        $params = array($nombre, $categoria->getIdCategoria());
        $stmt = sqlsrv_query($this->conn, $sql, $params);
        if ($stmt === false) {
            if (($errors = sqlsrv_errors() ) != null) {
                foreach ($errors as $error) {
                    if ($error['code'] === MSSQL_FK_ERR) {
                        sqlsrv_free_stmt($stmt);
                        return MSSQL_FK_ERR;
                    }
                }
            }
        }
        $rows_affected = sqlsrv_rows_affected($stmt);
        if (!$rows_affected === false) {
            echo $rows_affected . " rows were updated.<br />";
        }

        sqlsrv_free_stmt($stmt);
    }

}

?>
