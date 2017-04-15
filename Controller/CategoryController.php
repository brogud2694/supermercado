<?php

require './Constantes.php';
require 'Domain/Categoria.php';
require 'Core/ConexionDB.php';
require 'Model/CategoriaModel.php';

class CategoryController {

    private $categoriaModel;

    public function __construct() {
        $conexion = new ConexionDB();
        $this->categoriaModel = new CategoriaModel($conexion);
    }

    public function invoke() {

        if (isset($_GET['Category'])) {
            if (isset($_GET['ins'])) {
                if ($_GET['ins'] === "insert") {
                    $categoria = new Categoria();
                    $categoria->setnombre($_POST['nameIN']);
                    $this->categoriaModel->insertarCategoria($categoria);

                    header("Location: index.php?Category");
                    exit;
                }
            } else if (isset($_GET['upd']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                if ($_GET['upd'] === 'strUpd') {
                    header("Location: index.php?Category&idUpd=" . $id);
                    exit;
                } else if ($_GET['upd'] === 'doUpd') {
                    $this->categoriaModel->actualizarCategoria($id, $_POST['updNameIN']);
                    header("Location: index.php?Category");
                    exit;
                }
            } else if (isset($_GET['del']) && is_numeric($_GET['del'])) {

                $categoria = new Categoria();
                $categoria->setIdCategoria($_GET['del']);
                $result = $this->categoriaModel->borrarCategoria($categoria);
                if ($result === MSSQL_FK_ERR) {
                    header("Location: index.php?Category&ERR=" . MSSQL_FK_ERR);
                    exit;
                }
                header("Location: index.php?Category");
                exit;
            } else {
                $categorias = $this->categoriaModel->obtenerCategorias();
                include 'View/VistaCategoria.php';
            }
        } else {
            include 'View/indexView.php';
        }
    }

//INVOKE   
}

//CLASS
?>
