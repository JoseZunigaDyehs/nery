<?php
class view {

    private $_parametros = array();

    public function render($viewName) {
      include("views/shared/head.php");
      include("views/shared/script.php");
      include("views/$viewName.php");
      include("views/shared/foot.php");
    }
    public function renderPartial($viewName) {
        include("views/$viewName.php");
      }


    public function getParam($nombre) {
        return $this->_parametros[$nombre];
    }

    public function setParam($nombre , $parametro) {
        $this->_parametros[$nombre] = $parametro;
    }
}

?>