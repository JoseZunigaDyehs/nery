<?php
require_once "config/MySQL_PDO.php";

class control {
    private $_db;
    public function _getConnection() {
        return mySqlPDO::getInstancia()->getConexion();
    }
 
	public function validarLogin($login, $password) {

        $string = "select count(*) from usuario where nombreusuario='".$login."' and password='".$password."';"; 		
		//echo $string;
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

	public function listarCheques($rutCliente){
		$string = "select * from cheque where rutcliente='$rutCliente';";
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		echo json_encode($query);
		$query = null;
		echo json_encode($res);
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

	public function modificarPerfil($nombre, $apellido, $nombreusuario, $password){
		
		
		$string = "update usuario set nombre = '$nombre', apellido = '$apellido', nombreusuario = '$nombreusuario', password = '$password'  where nombreusuario='$nombreusuario';";
		$query = $this->_getConnection()->prepare($string);
		$query->execute();
		$query = null;
	}



		
	/**FIN PERFIL */
		
}
