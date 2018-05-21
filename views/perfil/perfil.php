
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
                <button class="btn btn-secondary mt-4" onclick="editarPerfil()">Editar</button>
            </div>
        </div>
    </main>

    <script src="../assets/js/perfil.js"></script>