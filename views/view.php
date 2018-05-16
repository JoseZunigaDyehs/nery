<?php
class view {

    private $_parametros = array();

    public function render($viewName) {
        include("views/$viewName.php");
    }

    public function getParam($nombre) {
        return $this->_parametros[$nombre];
    }

    public function setParam($nombre , $parametro) {
        $this->_parametros[$nombre] = $parametro;
    }
}