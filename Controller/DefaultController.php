<?php

require 'Core/ConexionDB.php';
require 'Model/UnidadModel.php';
require 'Model/CategoriaModel.php';
require 'Model/ArticuloModel.php';

class DefaultController {

    private $unidadModel;
    private $categoriaModel;
    private $articuloModel;

    public function __construct() {
        $conexion = new ConexionDB();
        $this->unidadModel = new UnidadModel($conexion);
        $conexion = new ConexionDB();
        $this->categoriaModel = new CategoriaModel($conexion);
        $conexion = new ConexionDB();
        $this->articuloModel = new ArticuloModel($conexion);
    }

//CONSTRUCTOR

    public function invoke() {

        if (isset($_GET['obtenerCategorias'])) {
            $categorias = $this->categoriaModel->obtenerCategorias();
            include 'View/MostrarCategorias.php';
        } else if (isset($_GET['formularioArticulo'])) {
            $respuesta = "";
            if ($_GET['formularioArticulo'] == "insertar") {
                $categorias = $this->unirCategorias();
                $numeroCategorias = $this->numeroCategorias();

                if ($this->articuloModel->insertarArticulo(
                                $_POST['nombre'], $_POST['precio'], $_POST['descripcion'], $_POST['unidad'], $categorias, $numeroCategorias)) {
                    $respuesta = "insertado";
                } else {
                    $respuesta = "no insertado";
                }
            } else {
                
            }

            $array_categorias = $this->categoriaModel->obtenerCategorias();
            $array_unidades = $this->unidadModel->obtenerUnidades();

            include 'View/formularioArticulo.php';
        } elseif (isset($_GET['consulta'])) {
            //$array_comentarios = $this->model->obtenerComentarios();
            //print_r($array_comentarios);
            include 'View/consulta.php';
        } else {
            include 'View/indexView.php';
        }//IF
    }

    public function unirCategorias() {
        $categorias = "";
        if (!empty($_POST['categorias'])) {
            foreach ($_POST['categorias'] as $check) {
                if ($categorias == '') {
                    $categorias = $check;
                } else {
                    $categorias = $check . ',' . $categorias;
                }
            }
        }
        return $categorias;
    }

    public function numeroCategorias() {
        $categorias = 0;
        if (!empty($_POST['categorias'])) {
            foreach ($_POST['categorias'] as $check) {
                $categorias = $categorias + 1;
            }
        }
        return $categorias;
    }

//INVOKE   
}

//CLASS
?>
