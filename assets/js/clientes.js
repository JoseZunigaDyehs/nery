function validarTodo() {
  var rut = document.getElementById('rut');
  var nombres = $('#nombres');
  var apellidos = $('#apellidos');
  var email = $('#email');
  var telefono = $('#telefono');

  var valido = true;

  if (!checkRut(rut)) {
    valido = false;
  }
  if (!valTexto(nombres, 4, 50)) {
    valido = false;
  }
  if (!valTexto(apellidos, 4, 50)) {
    valido = false;
  }
  if (!valEmail(email)) {
    valido = false;
  }
  if (!valTexto(telefono, 5, 10)) {
    valido = false;
  }

  if (valido) {
    return cliente = {
      "rut": rut.value,
      "nombres": nombres.val(),
      "apellidos": apellidos.val(),
      "email": email.val(),
      "telefono": telefono.val()
    }
  } else {
    return valido;
  }
}

function llenarTabla(cliente) {
  fn_agregaCliente(cliente);
}

function fn_agregaCliente(clientes) {
  $.ajax({
    url: 'index.php?id=6',
    type: 'post',
    data: 'rutCliente=' + cliente.rut + '&nombres=' + cliente.nombres + '&apellidos=' + cliente.apellidos + '&email=' + cliente.email + '&telefono=' + cliente.telefono,
    beforeSend: function () {
      $("#loading-div-background").css({ opacity: .9 });
      $("#loading-div-background").show();
    },
    success: function (data) {

      var tabla = $('#tablaClientes');
      var largoTabla = tabla.find('tbody tr').length;
      var fila = '<tr>';
      fila += '<td>';
      fila += '<p>' + cliente.rut + '</p>';
      fila += '<input type="text" value="' + cliente.rut + '" class="rut form-control editar d-none" onkeyup="valTexto(this,10,20)">';
      fila += '<label class="error text-danger d-none "></label>';
      fila += '</td>';
      fila += '<td>';
      fila += '<p>' + cliente.nombres + '</p>';
      fila += '<input type="text" value="' + cliente.nombres + '" class="nombres form-control editar d-none" onkeyup="valTexto(this,10,20)">';
      fila += '<label class="error text-danger d-none "></label>';
      fila += '</td>';
      fila += '<td>';
      fila += '<p>' + cliente.apellidos + '</p>';
      fila += '<input type="text" value="' + cliente.apellidos + '" class="apellidos form-control editar d-none" onkeyup="valTexto(this,10,20)">';
      fila += '<label class="error text-danger d-none "></label>';
      fila += '</td>';
      fila += '<td>';
      fila += '<input type="text" value="' + cliente.email + '" class="email form-control editar d-none">';
      fila += '<label class="error text-danger d-none "></label>';
      fila += '<p>' + cliente.email + '</p>';
      fila += '</td>';
      fila += '<td>';
      fila += '<p>' + cliente.telefono + '</p>';
      fila += '<input type="text" value="' + cliente.telefono + '" class="telefono form-control editar d-none" onkeyup="valNumber(this,5,10)">';
      fila += '<label class="error text-danger d-none "></label>';
      fila += '</td>';
      fila += '<td class="d-flex">';
      fila += '<a  class="btn btn-primary editar d-none cursor-pointer" onclick="guardar(this,' + "'clientes'" + ')" data-toggle="tooltip" data-placement="top" title="Guardar cliente"><i class="fas fa-check-circle"></i></a>';
      fila += '<a  class="btn btn-danger btnEliminar mr-2 cursor-pointer" onclick="eliminar(this,' + "'clientes'" + ')" data-toggle="tooltip" data-placement="top" title="Eliminar cliente"><i class="fas fa-trash-alt"></i></a>';
      fila += '<a  class="btn btn-secondary btnEditar mr-2 cursor-pointer" onclick="editar(this,' + "'clientes'" + ')" data-toggle="tooltip" data-placement="top" title="Editar cliente"><i class="fas fa-edit"></i></a>';
      fila += '<a class="btn btn-primary btnEditar cursor-pointer" onclick="ir(this,' + "'clientes'" + ')" data-toggle="tooltip" data-placement="top" title="Ir a cliente"><i class="fas fa-arrow-alt-circle-right"></i></a>';
      fila += '</td>';
      fila += '</tr>';

      tabla.find('tbody').append(fila);
      mostrarTabla(tabla);//Muestra tabla si tiene filas
      refreshFunction();
      alert('Se ha agregado el cliente');

    }
  });
}

function fn_editarCliente(clientes, editores) {

  $.ajax({
    url: 'index.php?id=8',
    type: 'post',
    data: 'rutCliente=' + clientes.rut + '&nombres=' + clientes.nombres + '&apellidos=' + clientes.apellidos + '&email=' + clientes.email + '&telefono=' + clientes.telefono,
    beforeSend: function () {
      $("#loading-div-background").css({ opacity: .9 });
      $("#loading-div-background").show();
    },
    success: function (data) {
      $.each(editores, function (i, editor) {
        //Si es la ultima columna
        if (editores.length - 1 === i) {
          $(editor).addClass('d-none');
          $(editor).siblings('.btnEliminar').removeClass('d-none');
          $(editor).siblings('.btnEditar').removeClass('d-none');
        } else {
          $(editor).addClass('d-none');
          var texto = $(editor).val();
          $(editor).siblings('p').text(texto);
          $(editor).siblings('p').removeClass('d-none');
        }
      });
    }
  });
}

function fn_eliminarCliente(e, tabla) {
  var rut = $(e).closest('tr').find('.rut').val();
  $.ajax({
    url: 'index.php?id=17',
    type: 'post',
    data: 'rutCliente=' + rut,
    success: function (data) {
      $(e).closest('tr').remove();
      mostrarTabla(tabla);//Muestra tabla si tiene filas
      refreshFunction();
      alert('Se ha eliminado correctamente al cliente');
    }
  });
}

$(document).ready(()=>{
  mostrarTabla($('#tablaClientes'));
});
