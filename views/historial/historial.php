<?php
    $cheques = $this->getParam("cheques");
?>  
    <header class="container my-5">
        <div class="row justify-content-center">
            <h1>Historial de cheques pagados</h1>
        </div>
    </header>
    <main class="container">
        <div class="row mb-5">
            <table class="table " id="tablaHistorial">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col ">Rut Cliente</th>
                            <th scope="col ">Numero</th>
                            <th scope="col ">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    foreach($cheques as $row){?>
                        <tr>
                            <td>
                                <p><?php echo $row["rutcliente"]?></p>
                            </td>
                            <td>
                                <p><?php echo $row["codigo"]?></p>
                            </td>
                            <td>
                                <p><?php echo $row["monto"]?></p>
                            </td>
                        </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                </table>
        </div>

    </main>

    <script src="../nery/assets/js/cheque.js "></script>
