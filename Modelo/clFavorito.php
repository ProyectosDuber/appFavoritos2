<?php

class clFavorito extends db_abstract_class {

    private $idfavorito;
    private $url;
    private $descripcion;
    private $Categoria;

    function __construct($datos) {
        parent::__construct();
        if (count($datos) > 1 || $datos != NULL) {
            foreach ($datos as $colum => $valor) {
                $this->$colum = $valor;
            }
        } else {
            $this->idfavorito = 0;
            $this->url = "";
            $this->descripcion = "";
            $this->Categoria = new categoria();
        }
    }

    function getIdfavorito() {
        return $this->idfavorito;
    }

    function getUrl() {
        return $this->url;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCategoria() {
        return $this->Categoria;
    }

    function setIdfavorito($idfavorito) {
        $this->idfavorito = $idfavorito;
    }

    function setUrl($url) {
        $this->url = $url;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCategoria($Categoria) {
        $this->Categoria = $Categoria;
    }

    protected function editar() {
        
    }

    public function eliminar() {
        
        $query = "DELETE FROM favoritos where idfavorito=?";
        parent::deleteRow($query, array($this->idfavorito));
    }

<<<<<<< HEAD
    public function insertar() {
=======
    protected function insertar() {
>>>>>>> c3cc8a1155dba3eb1b6a0d943bef0c3f2c4fff33

        $params = array(
            $this->url,
            $this->descripcion,
<<<<<<< HEAD
            $this->Categoria
=======
            $this->categoria->getIdcategoria()
>>>>>>> c3cc8a1155dba3eb1b6a0d943bef0c3f2c4fff33
        );

        if ($this->insertRow("INSERT INTO Favoritos VALUES('NULL',?,?,?)", $params)) {
            return true;
        } else {
            return false;
        }
    }

    protected static function buscar($query) {
        
    }

    protected static function buscarForId($id) {
        
    }

    public static function getAll() {
        $sql = "SELECT * from favoritos 
                inner join categorias
                on favoritos.Categoria = categorias.idcategoria
                inner join usuarios 
                on Usuario = usuarios.idUsuario

                where idUsuario =?";

        $favorito = new clFavorito();

//               if( $favoritos = $favorito->getRows($sql, array($idUsuario))){
//                   var_dump($favoritos);
//                   return $favoritos;
//               }else{
//                   return NULL;
//               }
    }

    public static function todo($idUsuario) {
<<<<<<< HEAD
        $sql = "SELECT favoritos.idfavorito,favoritos.url ,categorias.nombre,categorias.idcategoria,favoritos.decripcion as descripcionf , categorias.Usuario, categorias.descripcion as  descripcionc
 from favoritos 
=======
        $sql = "SELECT * from favoritos 
>>>>>>> c3cc8a1155dba3eb1b6a0d943bef0c3f2c4fff33
                inner join categorias
                on favoritos.Categoria = categorias.idcategoria
                inner join usuarios 
                on Usuario = usuarios.idUsuario

                where idUsuario =?";

        $favorito = new clFavorito($datos = NULL);
        $todos = array();
        if ($favoritos = $favorito->getRows($sql, array($idUsuario))) {

            foreach ($favoritos as $array) {
                $datos = array();
                $datos['idfavorito'] = $array['idfavorito'];
                $datos['url'] = $array['url'];
<<<<<<< HEAD
                $datos['descripcion'] = $array['descripcionf'];
=======
                $datos['descripcion'] = $array['descripcion'];
>>>>>>> c3cc8a1155dba3eb1b6a0d943bef0c3f2c4fff33

                

                $x = array();
                $x['idcategoria'] = $array['idcategoria'];
                $x['nombre'] = $array['nombre'];
<<<<<<< HEAD
                $x['descripcion'] = $array['descripcionc'];
=======
                $x['descripcion'] = $array['descripcion'];
>>>>>>> c3cc8a1155dba3eb1b6a0d943bef0c3f2c4fff33
                $x['Usuario'] = $array['Usuario'];
                $datos['Categoria'] = new categoria($x);

                $favori = new clFavorito($datos);
                $todos[] = $favori;
            }
            return  $todos;
                
        } else {
            return NULL;
        }
    }

}
