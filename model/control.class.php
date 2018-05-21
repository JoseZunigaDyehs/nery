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

	public function eliminarCliente($idPersona) {

        $string = "delete from persona where id =$idPersona;"; 		
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$query = null;
	}
	/** FIN CLIENTES*/
		
}
