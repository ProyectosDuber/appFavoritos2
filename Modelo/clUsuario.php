<?php

class clUsuario extends db_abstract_class {
    
    private $idUsuario;
    private $username;
    private $password;
    private $favoritos = array();
    private $categorias =array();
    
    function __construct($datos = array()) {
        parent::__construct();
        
            if(count($datos) >1){
                foreach ( $datos as $columna =>$dato ){
                    $this->$columna = $dato;
                }
                
            }else{
                $this->username="";
                $this->password="";
            }
        
    }
    
    function __destruct() {
        $this->Disconnect();
        
    }   

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }
    
    function getFavoritos() {
        return $this->favoritos;
    }

    function getCategorias() {
        return $this->categorias;
    }

    function setFavoritos($favoritos) {
        $this->favoritos = $favoritos;
    }

    function setCategorias($categorias) {
        $this->categorias = $categorias;
    }

            
    
    protected function editar() {
        $query = "UPDATE Usuarios SET username=?,password=? where idUsuario=?";
       $params = array(
       $this->username,
       $this->password,
       $this->idUsuario    
       );
        
        parent::updateRow($query, $params);
            $this->Disconnect();
    }

    protected function eliminar() {
        
    }

    public function insertar() {
             $query = "INSERT INTO Usuarios VALUES('NULL',?,?)";
       $params = array(
       $this->username,
       $this->password
      
       );
        
        parent::insertRow($query, $params);
        $this->Disconnect();
    }

    public static function buscar($query,$parametros = array()) {
        $usuario = new clUsuario();
        $array = $usuario->getRow($query, $parametros);
        
        if(count($array)>1 ){
        foreach ($array as $column=>$valor){
            $usuario->$column = $valor;
        }
         $usuario->setFavoritos(clFavorito::todo($usuario->getIdUsuario()));
       $usuario->setCategorias(categoria::todo($usuario->getIdUsuario()));

        return $usuario;
        }else{
            return NULL;
        }
    }

    public static function buscarForId($id) {
   
        
    }

    public static function getAll() {
        
    }
    public static function todo(){
        
    }

}
