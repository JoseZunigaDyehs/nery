<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes - Finanzas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="#">Finanzas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        <div class="collapse navbar-collapse justify-content-between text-white" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../perfil/perfil.html">Perfil
                    <span class="sr-only">(current)</span>
                </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="clientes.html">Clientes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login/login.html">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cartera/cartera.html">Cartera</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../historial/historial.html">Historial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../estadisticas/estadisticas.html">Estadisticas</a>
                </li>

            </ul>
            <a class="nav-link" href="#">Logout</a>
        </div>
    </nav>
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
                        <th scope="col">#</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <p>55555555-5</p>
                            <input type="text" value="55555555-5" class="rut form-control editar d-none" onkeyup="checkRut(this)">
                            <label class="error text-danger d-none "></label>
                        </td>
                        <td>
                            <p>Lorem</p>
                            <input type="text" value="Lorem" class="nombres form-control editar d-none" onkeyup="valTexto(this,4,50)">
                            <label class="error text-danger d-none "></label>
                        </td>
                        <td>
                            <p>Ipsum</p>
                            <input type="text" value="Ipsum" class="apellidos form-control editar d-none" onkeyup="valTexto(this,4,50)">
                            <label class="error text-danger d-none "></label>
                        </td>
                        <td>
                            <input type="text" value="lorem@ipsum.cl" class="email form-control editar d-none" onkeyup="valEmail(this)">
                            <label class="error text-danger d-none "></label>
                            <p>lorem@ipsum.cl</p>
                        </td>
                        <td>
                            <p>+569 5456 5455</p>
                            <input type="text" value="+569 5456 5455" class="telefono form-control editar d-none" onkeyup="valNumber(this,9,12)">
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
                </tbody>
            </table>
        </div>
    </main>
    <footer></footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="../assets/js/general.js"></script>
    <script src="../assets/js/clientes.js"></script>
</body>

</html>