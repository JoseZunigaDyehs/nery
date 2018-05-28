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
            <span id="id" class="d-none"><?php echo $row["idusuario"] ?></span>
            <div class="form-group col-md-3">
                <label class="w-100">Nombre Usuario:
                    <input id="nombreUsuario" type="text" class="form-control" placeholder="Nombre usuario" value="<?php echo $row["nombreusuario"] ?>" onkeyup="valTexto(this,4,50)">
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
            <div class="col-md-12 text-right">
            
                <button class="btn btn-secondary mt-4"  id="btnModificar">Editar</button>
            </div>
        </div>
    </main>

    
   

    <script src="../nery/assets/js/perfil.js"></script>