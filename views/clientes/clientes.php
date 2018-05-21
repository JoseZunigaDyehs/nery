<?php
    $clientes = $this->getParam("clientes");
?>   
    <header class="container my-5">
        <div class="row justify-content-center">
            <h1>Gestión de clientes</h1>
        </div>
    </header>
    <main class="container">
        <div class="row sec-pri py-4 mb-5">
            <div class="w-100 ml-3 mb-3">
                <h6>Agrega nuevo cliente:</h6>
            </div>
            <div class="form-group col-md-3">
                <label class="w-100">Rut:
     <input id="rut" type="text" class="form-control" placeholder="Rut cliente" onkeyup="checkRut(this)">
     <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="form-group col-md-3">
                <label class="w-100">Nombres:
     <input id="nombres" type="text" class="form-control" placeholder="Nombre cliente" onkeyup="valTexto(this,4,50)">
     <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="form-group col-md-3">
                <label class="w-100">Apellidos:
     <input id="apellidos" type="text" class="form-control" placeholder="Apellido cliente" onkeyup="valTexto(this,4,50)">
     <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="form-group col-md-3">
                <label class="w-100">Email:
     <input id="email" type="email" class="form-control" placeholder="Email cliente" onkeyup="valEmail(this)">
     <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="form-group col-md-3">
                <label class="w-100">Telefono:
     <input id="telefono" type="text" class="form-control" placeholder="Telefono cliente" onkeyup="valNumber(this,9,12)">
     <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="col-md-9 text-right">
                <button class="btn btn-secondary mt-4" onclick="agregar()">Agregar</button>
            </div>
        </div>
        <div class="row">
            <table class="table" id="tablaClientes">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Rut</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                <?php 
                    foreach($clientes as $row){?>
                    <tr>
                        <td>
                            <p><?php echo $row["rutcliente"]?></p>
                            <input type="text" value="<?php echo $row["rutcliente"]?>" class="rut form-control editar d-none" onkeyup="checkRut(this)">
                            <label class="error text-danger d-none "></label>
                        </td>
                        <td>
                            <p><?php echo $row["nombres"]?></p>
                            <input type="text" value="<?php echo $row["nombres"]?>" class="nombres form-control editar d-none" onkeyup="valTexto(this,4,50)">
                            <label class="error text-danger d-none "></label>
                        </td>
                        <td>
                            <p><?php echo $row["apellidos"]?></p>
                            <input type="text" value="<?php echo $row["apellidos"]?>" class="apellidos form-control editar d-none" onkeyup="valTexto(this,4,50)">
                            <label class="error text-danger d-none "></label>
                        </td>
                        <td>
                            <input type="text" value="<?php echo $row["email"]?>" class="email form-control editar d-none" onkeyup="valEmail(this)">
                            <label class="error text-danger d-none "></label>
                            <p><?php echo $row["email"]?></p>
                        </td>
                        <td>
                            <p><?php echo $row["telefono"]?></p>
                            <input type="text" value="<?php echo $row["telefono"]?>" class="telefono form-control editar d-none" onkeyup="valNumber(this,9,12)">
                            <label class="error text-danger d-none "></label>
                        </td>
                        <td class="d-flex">
                            <a class="btn btn-primary editar d-none cursor-pointer" onclick="guardar(this)" data-toggle="tooltip" data-placement="top" title="Guardar cliente">
                                <i class="fas fa-check-circle"></i>
                            </a>
                            <a class="btn btn-danger btnEliminar mr-2 cursor-pointer" onclick="eliminar(this)" data-toggle="tooltip" data-placement="top" title="Eliminar cliente">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                            <a class="btn btn-secondary btnEditar mr-2  cursor-pointer" onclick="editar(this)" data-toggle="tooltip" data-placement="top" title="Editar cliente">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-primary btnEditar cursor-pointer" onclick="editar(this)" data-toggle="tooltip" data-placement="top" title="Ir a cliente">
                                <i class="fas fa-arrow-alt-circle-right"></i>
                            </a>
                        </td>
                    </tr>
                <?php 

                    } 
                ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="../nery/assets/js/clientes.js"></script>