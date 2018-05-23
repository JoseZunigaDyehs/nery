<?php
    $cheques = $this->getParam("cheques");
    $contador = 1;
?>   
<?php 
    foreach($cheques as $row){?>
      <tr>
          <td>
              <p class="numero"><?php echo $row["codigo"]?></p>
          </td>
          <td>
              <p class="deuda"><?php echo $row["monto"]?></p>
          </td>
          <td class="d-flex justify-content-center">
              <div class="custom-control custom-checkbox seleccionado" onchange="fillTablaCheques(this)">
                  <input type="checkbox" class="custom-control-input" id="<?php echo $contador?>" />
                  <label class="custom-control-label" for="<?php echo $contador?>"></label>
              </div>
          </td>
      </tr>
<?php 
$contador++;
  } 
?>