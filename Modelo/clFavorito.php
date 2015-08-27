<?php

class clFavorito extends db_abstract_class {
    private $idfavorito;
    private $url;
    private $descripcion;
    private $categoria ;
    
    function __construct($datos) {
        parent::__construct();
        if(count($datos)>1){
            foreach ( $datos as $colum=>$valor ){
                $this->$colum= $valor;
            }
        }else{
            $this->idfavorito =0;
            $this->url ="";
            $this->descripcion ="";
            $this->categoria =new categoria();
            
        }
        
        
    }

    
    protected function editar() {
        
    }

    protected function eliminar() {
        
    }

    protected function insertar() {
     
        $params = array(
        $this->url,
        $this->descripcion,
        $this->categoria->getIdcategoria()
            
        );
        
        $this->insertRow("INSERT INTO Favoritos VALUES('NULL',?,?,?)", $params);
        
    }

    protected static function buscar($query) {
        
    }

    protected static function buscarForId($id) {
        
    }

    protected static function getAll() {
        
    }

}
