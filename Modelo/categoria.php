<?php
class categoria extends db_abstract_class {
   
    private $idcategoria;
    private $nombre;
    private $descripcion;
    private $Usuario ;
   
    function __construct($datos = array()) {
        parent::__construct();
        
        if(count($datos)>1){
         
            foreach ($datos as $columna=>$valor){
                $this->$columna = $valor;
            }
        }else{
            $this->idcategoria =0;
            $this->nombre ="";
            $this->descripcion ="";
            $this->Usuario =new clUsuario();
            
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
        return $this->Usuario;
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
        $this->Usuario = $usuario;
    }

        

    protected function editar() {
        
    }

    protected function eliminar() {
        
    }

    public function insertar() {
        $query = "INSERT INTO categorias VALUES('NULL',?,?,?)";
        $params = array(
        $this->nombre,
        $this->descripcion,
        $this->Usuario
            
            
        );
        $this->insertRow($query, $params);
        
    }

    protected static function buscar($query) {
        
    }

    protected static function buscarForId($id) {
        
    }

    protected static function getAll() {
        
    }
    
    public static function todo($idUsuario){
        $sql = "select * from categorias 
inner join usuarios
on categorias.Usuario = usuarios.idUsuario

where idUsuario = ?";
        $cate = new categoria();
        $array = $cate->getRows($sql, array($idUsuario));
        $categorias = array();
        
        foreach ($array as $datos){
            $x = array();
            $x['idcategoria']=$datos['idcategoria'];
            $x['nombre']=$datos['nombre'];
            $x['descripcion']=$datos['descripcion'];
            $x['Usuario']=$datos['Usuario'];
            $categoria= new categoria($x);
            
            $categorias[] = $categoria;
            
            
            
        }
       
        return $categorias;
        
        
        
    }

}
