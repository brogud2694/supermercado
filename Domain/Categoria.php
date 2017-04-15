<?php

class Categoria {
    private $idCategoria;
    private $nombre;
    
    public function getIdCategoria() {
        return $this->idCategoria;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setIdCategoria($idCategoria){
        $this->idCategoria = $idCategoria;
    }
    
    public function setnombre($nombre){
        $this->nombre = $nombre;
    }
    
}


?>