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
		
			
			if(isset($_SESSION["estado"])) //viene algo en la session con el nombre estado?
			{
				if(isset($_GET['id'])) {// La Variable id que llega por GET está definida";
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
							$this->_view->render("frm_bienvenido");	
							break;
						case 4:	
							$this->_view->render("frm_index");	
							break;
						case 5:	
							$this->_view->render("frm_agregaAlumno");	
							break;
						case 6:	
							$this->_agregarCliente();	
							break;
						case 8:	
							$this->_modificarCliente();	
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
						case 17:
							$this->_eliminarCliente();
							break;
						case 18:
							$this->_listarCheques();
							break;
						case 19:
						    $this->_modificarPerfil();   
								break;
						case 20:
						    $this->_getCliente();   
								break;
						case 21:
						    $this->_pagarCheque();
								break;
						case 22:
						    $this->_cheques();
								break;
						case 23:
						    $this->_crearCheque();
								break;
						case 24:
						    $this->_historial();
						    break;
						case 99:
							$this->_cerrarSession();	
							break;
						default:
							$this->_view->render("shared/404");	
							break;
					}
				}
			}
			else
			{
				if(isset($_GET['id']))//viene algo en la varible id del GET?
				{
						if ($_GET['id'] == 0) // esa variable es = 0?
						{
							if(isset($_POST['login'])) //viene la variable login en el POST?
							{
								$this->_validarLogin(); // solo si viene el dato por POST validaré al usuario
							}
							else //Esto quiere decir que no se ha logueado por lo tanto lo envío a loguearse
							{
								$this->_view->render("login/login");
							}
						}
						else // como no viene 0, en el id del GET envío a loguear
						{
							$this->_view->render("login/login"); 
						}
				}
				else // como no viene nada en el id del GET envío a loguear
				{
					$this->_view->render("login/login");
				}
			}
  }
  
	public function _listarPersonas(){
    $control = new control();
		$likeNombre = $_GET["like"];
		$this->_view->setParam("datos", $control->listarPersonas($likeNombre));	
    $this->_view->render("frm_listado");
	}

	public function _eliminarPersona($idPersona)	{
		$control = new control();
		$control->eliminarPersona($idPersona);
	}

	/** CLIENTES */

	public function _agregarCliente()	{
		 $control = new control();
		 $rut = $_POST['rutCliente'];
		 $nombre =  $_POST['nombres'];
		 $apellido =  $_POST['apellidos'];
		 $email =  $_POST['email'];
		 $telefono = $_POST['telefono'];
		 $respuesta = $control->insertarCliente($rut, $nombre, $apellido, $email, $telefono);
	}

	public function _getCliente()	{
		$control = new control();
		$rut = $_POST['rutCliente'];
		$respuesta = $control->getCliente($rut);
		echo json_encode($respuesta[0]);
 }

	public function _eliminarCliente()	{
		$control = new control();
		$rut = $_POST['rutCliente'];
		$respuesta = $control->eliminarCliente($rut);
		return $respuesta;
 }
	
	/** FIN CLIENTES */

	/** LOGIN */
	public function _validarLogin()	{
		$control = new control();
		$log =  $_POST['login'];
		$pass =  $_POST['pass'];
		$respuesta = $control->validarLogin($log, $pass);
		if ($respuesta == 1)
		{
		 $_SESSION["usuario"] = $log;
		 $_SESSION["estado"] = "AUT";
		 echo json_encode($respuesta);
		}	
	}

	public function _modificarCliente(){
		$control = new control();
		$rut = $_POST['rutCliente'];
		$nombre =  $_POST['nombres'];
		$apellido =  $_POST['apellidos'];
		$email =  $_POST['email'];
		$telefono = $_POST['telefono'];
		$respuesta = $control->modificarClientes($rut, $nombre, $apellido, $email, $telefono);
	}
	 
	public function _cerrarSession()	{
		@session_start();
		session_destroy();
		header("Location: index.php");
	}

	/** FIN LOGIN */

	//***************************************************************** */
	public function _perfil() {
		// session_start();
		$mail = $_SESSION["usuario"];
		$control = new control();
		$this->_view->setParam("usuario", $control->mostrarPerfil($mail));
		$this->_view->render("perfil/perfil");	
	}

	public function _modificarPerfil(){
		$control = new control();
		$nombreusuario = $_POST['nombreUsuario'];
		$password = $_POST['password'];
		$nombre = $_POST['nombres'];
		$apellido = $_POST['apellidos'];
		$id = $_POST['id'];
		$respuesta = $control-> modificarPerfil($nombreusuario, $password, $nombre, $apellido,$id);
	}

	public function _cartera() {
		$this->_view->render("cartera/cartera");	
	}

	public function _clientes() {
		$control = new control();
		$this->_view->setParam("clientes", $control->listarClientes());
		$this->_view->render("clientes/clientes");	
	}

	public function _login() {
		$this->_view->render("login/login");	
	}

	public function _cheques() {
		$this->_view->render("cheques/cheques");	
	}

	/**CARTERA */
	public function _listarCheques(){
		$control = new control();
		$rut = $_POST['rutCliente'];
		$this->_view->setParam("cheques", $control->listarCheques($rut));
		$this->_view->renderPartial("cartera/_cheques");
	}
	
	public function _pagarCheque() {
		$control = new control();
		$id = $_POST["numDocumento"];
		$respuesta = $control->pagarCheque($id);
		echo $respuesta;
		return $respuesta;
	}

	public function _crearCheque() {
		$control = new control();
		$rutCliente = $_POST["rutCliente"];
		$monto = $_POST["monto"];
		$numero = $_POST["numero"];
		$respuesta = $control->crearCheque($monto,$rutCliente,$numero);
		return $respuesta;
	}

	public function _historial() {
		$control = new control();
		$this->_view->setParam("cheques", $control->historial());
		$this->_view->render("historial/historial");	
	}
    
}
