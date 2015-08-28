<?php
class categoria extends db_abstract_class {
   
    private $idcategoria;
    private $nombre;
    private $descripcion;
    private $Usuario ;
   
    function __construct($datos = array()) {
        parent::__construct();
        
        if(count($datos)>1){
         
<<<<<<< HEAD
            foreach ($datos as $columna=>$valor){
                $this->$columna = $valor;
            }
=======
            $this->idcategoria = $datos['idcategoria'];
             $this->nombre = $datos['nombre'];
              $this->descripcion = $datos['descripcion'];
               $this->Usuario = $datos['Usuario'];
>>>>>>> c3cc8a1155dba3eb1b6a0d943bef0c3f2c4fff33
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
<<<<<<< HEAD
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
=======
        var_dump($array);
        return $array;
>>>>>>> c3cc8a1155dba3eb1b6a0d943bef0c3f2c4fff33
        
        
        
    }

}
