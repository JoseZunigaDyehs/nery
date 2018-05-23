
    <header class="container my-5">
        <div class="row justify-content-center">
            <h1>Cartera de clientes</h1>
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
                <h6>Cheques</h6>
                <h6 id="nombreCliente">Pablo Alejandro Pérez Dararola</h6>
            </div>
            <div class="sec-pri p-3 w-100">
                <table class="table" id="tablaClientes">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">N° Doc</th>
                            <th scope="col">Deuda</th>
                            <th scope="col">Selección</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row mb-5 align-items-start d-none " id="deuda">
            <h6 class="col-md-12 ">Deuda</h6>
            <div class=" col-md-9 ">
                <table class="table " id="tablaDeuda">
                    <thead class="thead-dark ">
                        <tr>
                            <th scope="col ">#</th>
                            <th scope="col ">Cheque</th>
                            <th scope="col ">Capital</th>
                            <th scope="col ">Interés (10%)</th>
                            <th scope="col ">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row ">1</th>
                            <td>
                                <p>N° Doc: 321512</p>
                                <p>Fecha protesto: 25/05/2017</p>
                                <p>Motivo: No pago algo</p>
                            </td>
                            <td>
                                <p>213.513</p>
                            </td>
                            <td>
                                <p>35.000</p>
                            </td>
                            <td>
                                <p>100.000</p>
                            </td>
                            <td>
                                <p>348.513</p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row ">2</th>
                            <td>
                                <p>N° Doc: 321512</p>
                                <p>Fecha protesto: 25/05/2017</p>
                                <p>Motivo: No pago algo</p>
                            </td>
                            <td>
                                <p>213.513</p>
                            </td>
                            <td>
                                <p>35.000</p>
                            </td>
                            <td>
                                <p>100.000</p>
                            </td>
                            <td>
                                <p>348.513</p>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <p class="deuda">213.513</p>
                            </td>
                            <td>
                                <p class="interes">35.000</p>
                            </td>
                            <td>
                                <p class="total">348.513</p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-3 ">
                <!-- <div class="sec-pri p-3 mb-4 b-shadow">
                    <div class="d-flex ">
                        <h5>Total: $</h5>
                        <h5>545.546</h5>
                    </div>
                    <div class="d-flex ">
                        <h5 class="mr-2">Cheques a pagar: </h5>
                        <h5 contenteditable="true" class="content-editable">2</h5>
                    </div>
                    <div class="d-flex ">
                        <h5>Por Cheque: $</h5>
                        <h5>253.546</h5>
                    </div>
                </div> -->
                <div class="w-100 d-flex justify-content-end ">
                    <button class="btn btn-primary " onclick="pagarCheques() ">Pagar</button>
                </div>
            </div>

        </div>

    </main>

    <script src="../nery/assets/js/cartera.js "></script>
