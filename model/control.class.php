<?php
require_once "config/MySQL_PDO.php";

class control {
    private $_db;
    public function _getConnection() {
        return mySqlPDO::getInstancia()->getConexion();
    }
 
	public function validarLogin($login, $password) {

        $string = "select count(*) from usuario where nombreusuario='".$login."' and password='".$password."';"; 		
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$res = $query->fetchColumn();
		$query = null;
		return $res;
		}

	
	/** CLIENTES */

	public function insertarCliente($rutCliente, $nombre, $apellido, $email, $telefono ) {	
		$string = "insert into cliente values ('$rutCliente','$nombre', '$apellido', '$email', '$telefono' , 1);"; 
		$query = $this->_getConnection()->prepare($string);
		$query->execute();
		$query = null;
	}

	public function listarClientes() {

        $string = "select * from cliente";
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$query = null;
		return $res;
	}

	public function eliminarCliente($rutCliente) {

        $string = "delete from cliente where rutcliente='$rutCliente';"; 		
        $query = $this->_getConnection()->prepare($string);
		$query->execute();
		return $query;
		$query = null;
	}

	public function modificarClientes($rutCliente, $nombre, $apellido, $email, $telefono){

		$string = "update cliente set rutcliente = '$rutCliente', nombres = '$nombre', apellidos = '$apellido', email = '$email', telefono = '$telefono' where rutcliente='$rutCliente';";
		$query = $this->_getConnection()->prepare($string);
		$query->execute();
		$query = null;
	}

	public function getCliente($rutCliente) {
        $string = "select * from cliente where rutcliente='$rutCliente'"; 		
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$query = null;
		return $res;
	}
	/** FIN CLIENTES*/

	/**PERFIL */
	public function mostrarPerfil($email){
		$string = "select * from usuario where nombreusuario='$email';"; 
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$query = null;
		return $res;
	}

	public function modificarPerfil( $nombreusuario, $password,$nombre, $apellido){

		$string = "update usuario set nombreusuario = '$nombreusuario', password = '$password', nombre = '$nombre', apellido = '$apellido'  where nombreusuario='$nombreusuario';";
		$query = $this->_getConnection()->prepare($string);
		$query->execute();
		$query = null;
	}
	/**FIN PERFIL */

	/**CARTERA */

	public function listarCheques($rutCliente){
		$string = "select * from cheque where rutcliente='$rutCliente' and idestado=1;";
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$query = null;
		return $res;
	}

	public function pagarCheque($id){

		$string = "update cheque set idestado = '2' where codigo='$id';";
		$query = $this->_getConnection()->prepare($string);
		$query->execute();
		$res = $query;
		$query = null;
		return $res;
	}

	/**FIN CARTERA */

		
}
