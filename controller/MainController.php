<?php
session_start();
require_once "views/view.php";
require_once "model/control.class.php";

class MainController {

    private $_view;
    function __construct() {
        $this->_view = new View(); 
    }
    public function execute() {
		
			
		// if(isset($_SESSION["estado"])) //viene algo en la session con el nombre estado?
		// {
		// 	//echo "ESTOY AUTENTICADO";
		// 	//echo $_GET['id'];
			if(isset($_GET['id'])) // La Variable id que llega por GET está definida";
			{
			$accion = $_GET['id']; //Asignamos el valor de ID que viene por post a la variable $accion
			//$url = $_SERVER['PHP_SELF'];
			switch ($accion) { 
				case 1:
					$this->_listarPersonas();
					break;
				case 2:
					$idPersona =  $_GET['idPersona'];
					$this->_eliminarPersona($idPersona);
					break;
				case 3:
					//$this->_view->render("frm_index");	
					$this->_view->render("frm_bienvenido");	
					break;
				case 4:	
					$this->_view->render("frm_index");	
					break;
				case 5:	
					$this->_view->render("frm_agregaAlumno");	
					break;
				case 6:	
					$this->_agregarAlumno();	
          break;
        case 11:
          $this->_cartera();
					break;
				case 12:
          $this->_perfil();
					break;
				case 13:
          $this->_clientes();
					break;
				case 14:
          $this->_login();
          break;
				case 99:
					$this->_cerrarSession();	
					break;	
				}
			}			
		// }
		// else
		// {
		// 	if(isset($_GET['id']))//viene algo en la varible id del GET?
		// 	{
		// 			if ($_GET['id'] == 0) // esa variable es = 0?
		// 			{
		// 				if(isset($_POST['login'])) //viene la variable login en el POST?
		// 				{
		// 					$this->_validarLogin(); // solo si viene el dato por POST validaré al usuario
		// 				}
		// 				else //Esto quiere decir que no se ha logueado por lo tanto lo envío a loguearse
		// 				{
		// 					$this->_view->render("frm_login");
		// 				}
		// 			}
		// 			else // como no viene 0, en el id del GET envío a loguear
		// 			{
		// 				$this->_view->render("frm_login"); 
		// 			}
		// 	}
		// 	else // como no viene nada en el id del GET envío a loguear
		// 	{
		// 		$this->_view->render("frm_login");
		// 	}

		// }		

  }
  
	public function _listarPersonas(){
        $control = new control();
		$likeNombre = $_GET["like"];
		$this->_view->setParam("datos", $control->listarPersonas($likeNombre));	
        $this->_view->render("frm_listado");  
				//var_export($respuesta);
		
    }
	public function _eliminarPersona($idPersona)
	{
		 $control = new control();
		 $control->eliminarPersona($idPersona);
	}
	public function _validarLogin()
	{
		 $control = new control();
		 $log =  $_POST['login'];
		 $pass =  $_POST['pass'];
		 $respuesta = $control->validarLogin($log, $pass);
		 if ($respuesta == 1)
		 {
			// Crea session
			//session_start();
			// Storing session data
			$_SESSION["usuario"] = $log;
			$_SESSION["estado"] = "AUT";
			echo json_encode($respuesta);
		 }
		 
	}
	public function _agregarAlumno()
	{
		 $control = new control();
		 $nombre =  $_POST['name'];
		 $apellido =  $_POST['lname'];
		 $sexo =  $_POST['sex'];
		 $respuesta = $control->insertarAlumno($nombre, $apellido,$sexo);
 
	}
	public function _cerrarSession()
	{
		@session_start();
		session_destroy();
		header("Location: index.php");
	}




		//***************************************************************** */
    public function _perfil() {
      $this->_view->render("perfil/perfil");	
    }
    public function _cartera() {
      $this->_view->render("cartera/cartera");	
    }
    public function _clientes() {
      $this->_view->render("clientes/clientes");	
    }
    public function _login() {
      $this->_view->render("login/login");	
    }
	
    
    
}
