<?php
class categoria extends db_abstract_class {
   
    private $idcategoria;
    private $nombre;
    private $descripcion;
    private $usuario ;
   
    function __construct($datos = array()) {
        parent::__construct();
        
        if(count($datos)>1){
            foreach ($datos as $colum=>$valor){
                $this->$colum = $valor;
            }
        }else{
            $this->idcategoria =0;
            $this->nombre ="";
            $this->descripcion ="";
            $this->usuario =new clUsuario();
            
        }
        
        
    }
    
    function getIdcategoria() {
        return $this->idcategoria;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setIdcategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

        

    protected function editar() {
        
    }

    protected function eliminar() {
        
    }

    protected function insertar() {
        
    }

    protected static function buscar($query) {
        
    }

    protected static function buscarForId($id) {
        
    }

    protected static function getAll() {
        
    }

}
