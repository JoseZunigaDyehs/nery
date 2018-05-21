<?php
class mySqlPDO {

    private $_url = "mysql:dbname=banco;host=localhost";
    private $_usuario = "root";
    private $_clave = "";
    private $_conexion;

    static private $_mismaInstancia = null;

    static public function getInstancia(){
        if(self::$_mismaInstancia === null){
            self::$_mismaInstancia = new self();
        }
        return self::$_mismaInstancia;
    }

    function __construct() {

        try {
            $pdo = new PDO($this->_url, $this->_usuario, $this->_clave);
            $pdo->setAttribute(3, 2);

            $this->_conexion =$pdo;
			//echo "conection sucess!";
        } catch (PDOException $e) {
            echo "Ocurri&oacute; un error " .$e->getMessage();
        }
    }

    public function getConexion(){
        return $this->_conexion;
    }
}