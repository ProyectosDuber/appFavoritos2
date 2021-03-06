<?php
require_once '../Modelo/db_abstract_class.php';
require_once '../Modelo/clUsuario.php';
require_once '../Modelo/clFavorito.php';
require_once '../Modelo/categoria.php';
if(!empty($_GET['action'])){
    favoritos_controller::main($_GET['action']);
}

class favoritos_controller{
	
	static function main($action){
		if ($action == "crear"){
			favoritos_controller::crear();
		}else if ($action == "editar"){
			favoritos_controller::editar();
		}else if ($action == "buscarID"){
			favoritos_controller::buscarID(1);
		}else if($action == "buscar"){
                    favoritos_controller::buscar();
                } 
	}
	
	static public function crear (){
		try {
                    session_start();
			$datos = array();
                        $datos['nombre']= $_POST['nombre'];
                        $datos['descripcion'] = $_POST['descripcion'];        
                        $datos['Usuario'] = $_SESSION['idUsuario'];
                        $categoria = new categoria($datos);
                        $categoria->insertar();
                        
			header("Location: ../Vista/favoritos.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../Vista/favoritos.php?respuesta=error");
		}
	}
	
	static public function editar (){
		try {
			
			$arrayUser = array();
			$arrayUser['cedula'] = $_POST['cedula'];
			$arrayUser['nombres'] = $_POST['nombres'];
			$arrayUser['apellidos'] = $_POST['apellidos'];
                        $arrayUser['sexo'] = $_POST['sexo'];
			$arrayUser['fechaDeNacimiento'] = $_POST['fechaDeNacimiento'];
                        $arrayUser['telefono'] = $_POST['telefono'];
                        $arrayUser['email'] = $_POST['email'];
                        $arrayUser['direccion'] = $_POST['direccion'];
			
			$usuario = new usuarios ($arrayUser);
			$usuario->editar();
			header("Location: ../frmNewUser.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../frmNewUser.php?respuesta=error");
		}
	}
	
	static public function buscarID ($id){
		try { 
			return usuarios::buscarForId($id);
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}
	
	public static function buscarAll (){
		try {
			return usuarios::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}

	public static function buscar (){
		try {
                   $arrayDeUsuario =array();
                   $arrayDeUsuario[] = $_POST['username'];
                   $arrayDeUsuario[] = $_POST['password'];
                   
                   $query = "SELECT * FROM Usuarios where username =? and password=?";
                   
                   $usario = clUsuario::buscar($query, $arrayDeUsuario);
                  if($usario!=NULL){
                      session_start();
                      
                      $_SESSION['username'] =$_POST['username'];
                      $_SESSION['password'] = $_POST['password'];
                      $_SESSION['idUsuario'] = $usario->getIdUsuario();
                         header("Location: ../Vista/favoritos.php");
                  }  else {
                     header("Location: ../Vista/login.php?respuesta=invalido");
                  } 
                
                 //  
               
                    
		} catch (Exception $e) {
                    
			  header("Location: ../Vista/login.php?respuesta=error");
		}
	}
        
        
	
	
}
?>