<?php
require_once "config/MySQL_PDO.php";

class control {
    private $_db;
    public function _getConnection() {
        return mySqlPDO::getInstancia()->getConexion();
    }
 

	/*public function statusDespacho(){
	try
		{
				$con = $this->_db;
				$qry = $con->query("SELECT 1 FROM ITEM");
				//$qry = $con("SELECT 1 FROM ITEM");
				//$qry->bindParam(1, $numeroBoleta, PDO::PARAM_INT);
				$qry->execute();
				$res = $qry->fetchColumn();
				$con = null;
				return $res;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}*/
	public function listarPersonas($likeNombre) {

        $string = "select * from persona where nombre like '%$likeNombre%'"; 		
        $query = $this->_getConnection()->prepare($string);
        //$query->bindParam(1, $login, PDO::PARAM_STR);
        $query->execute();
		//$res = $query->fetchColumn();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$query = null;
		return $res;

    }
	public function eliminarPersona($idPersona) {

        $string = "delete from persona where id =$idPersona;"; 		
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$query = null;
		}
	public function insertarCliente($rutCliente, $nombre, $apellido, $email, $telefono ) {

        $string = "insert into cliente values ('$rutCliente','$nombre', '$apellido', '$email', '$telefono');"; 
//echo 	$string;	
        $query = $this->_getConnection()->prepare($string);
        $query->execute();
		$query = null;
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
	
	
	
	
   
}
