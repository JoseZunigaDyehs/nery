<header class="container my-5">
    <div class="row justify-content-center">
        <h1>Gestión de cheques</h1>
    </div>
</header>
<main class="container">
    <div class="row sec-pri py-5 mb-5">
        <div class="form-group mb-0 col-md-12 d-flex justify-content-center align-items-center">
            <label class="mb-0 mr-2">Buscar cliente por Rut:</label>
            <label class="mb-0 mr-2">
                <input id="rut" type="text" class="form-control" placeholder="Rut cliente" onkeyup="checkRut(this)">
                <label class="error text-danger d-none position-absolute"></label>
            </label>
            <button class="btn btn-secondary" onclick="buscarPorRut(this)">Buscar</button>
        </div>

    </div>

    <div class="row mb-5 d-none" id="cheques">
        <div class="d-flex justify-content-between col-md-12">
            <h6>Ingresar Cheque</h6>
            <h6 id="nombreCliente">Pablo Alejandro Pérez Dararola</h6>
        </div>
        <div class="sec-pri p-3 w-100 d-flex">
            <input type="hidden" id="rutCliente" />
            <div class="form-group col-md-4">
                <label class="w-100">Numero Cheque:
                    <input id="numero" type="text" class="form-control" placeholder="Numero cheque" onkeyup="valNumber(this,1,50)" />
                    <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="form-group col-md-4">
                <label class="w-100">Monto Cheque:
                    <input id="monto" type="text" class="form-control" placeholder="Monto cheque" onkeyup="valNumber(this,3,50)" />
                    <label class="error text-danger d-none position-absolute"></label>
                </label>
            </div>
            <div class="d-flex align-items-center">
                <a class="btn btn-primary crear cursor-pointer" onclick="guardarCheque(this)" data-toggle="tooltip" data-placement="top"
                    title="Guardar cheque">
                    <i class="fas fa-check-circle"></i>
                </a>
            </div>

        </div>
    </div>

</main>

<script src="../nery/assets/js/cheque.js "></script>