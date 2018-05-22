<?php
    $cliente = $this->getParam("usuario");
?>   
    <header class="container my-5">
        <div class="row justify-content-center">
            <h1>Perfil</h1>
        </div>
    </header>
    <main class="container">
        <div class="row sec-pri py-4 mb-5">
            <div class="w-100 ml-3 mb-3">
                <h6>Edita tu perfil:</h6>
            </div>
            <?php 
            foreach($cliente as $row){?>
            <div class="form-group col-md-3">
                <label class="w-100">Email:
                    <input id="email" type="text" class="form-control" placeholder="Email cliente" value="<?php echo $row["nombreusuario"] ?>" >
                    <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            
            <div class="form-group col-md-3">
                <label class="w-100">Nombre:
                <input id="nombres" type="text" class="form-control" placeholder="Nombre cliente" onkeyup="valTexto(this,4,50)"  value="<?php echo $row["nombre"] ?>">
                <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="form-group col-md-3">
                <label class="w-100">Apellido:
                <input id="apellidos" type="text" class="form-control" placeholder="Apellido cliente" onkeyup="valTexto(this,4,50)"  value="<?php echo $row["apellido"] ?>">
                <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            
            <div class="form-group col-md-3">
                <label class="w-100">Contreña:
                <input id="password" type="password" class="form-control" placeholder="password" onkeyup="valTexto(this,4,50)"  value="<?php echo $row["password"] ?>">
                <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>

            <?php 
                } 
                ?>
            <div class="col-md-9 text-right">
                <button class="btn btn-secondary mt-4" onclick="editarPerfil()">Editar</button>
            </div>
        </div>
    </main>

    <main class="container">
        <div class="row sec-pri py-4 mb-5" style="display:none">
            <div class="w-100 ml-3 mb-3">
            <div class="form-group col-md-3">
                <label class="w-100">Email:
                    <input id="email" type="text" class="form-control" placeholder="Email cliente" value="<?php echo $row["nombreusuario"] ?>" >
                    <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>            
            <div class="form-group col-md-3">
                <label class="w-100">Nombre:
                <input id="nombres" type="text" class="form-control" placeholder="Nombre cliente" onkeyup="valTexto(this,4,50)"  value="<?php echo $row["nombre"] ?>">
                <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="form-group col-md-3">
                <label class="w-100">Apellido:
                <input id="apellidos" type="text" class="form-control" placeholder="Apellido cliente" onkeyup="valTexto(this,4,50)"  value="<?php echo $row["apellido"] ?>">
                <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            
            <div class="form-group col-md-3">
                <label class="w-100">Contreña:
                <input id="password" type="password" class="form-control" placeholder="password" onkeyup="valTexto(this,4,50)"  value="<?php echo $row["password"] ?>">
                <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
                <button type="submit" class="btn btn-primary" id="btnModificar" >Ingresar</button>
            </div>
        </div>
    </main>

   

    <script src="../nery/assets/js/perfil.js"></script>