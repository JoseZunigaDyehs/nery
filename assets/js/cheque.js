function buscarPorRut(e) {
  var rut = $('#rut').val();

  //método que trae y pinta cheques de clientes
  $.ajax({
    url: 'index.php?id=18',
    type: 'post',
    data: 'rutCliente=' + rut,
    success: function (data) {
      if (data.trim() !== "") {
        var tablaBody = $('#cheques').find('tbody');
        tablaBody.html(data);
        $('#cheques').removeClass('d-none');

        $.ajax({
          url: 'index.php?id=20',
          type: 'post',
          data: 'rutCliente=' + rut,
          success: function (data) {
            var cliente = JSON.parse(data);
            $('#nombreCliente').text(cliente.nombres + ' ' + cliente.apellidos);
            $('#rutCliente').val(cliente.rutcliente);
          }
        });

      } else {
        alert('No existen cheques para mostrar');
      }
    }
  });

}

function guardarCheque() {
  var numero = $('#numero');
  var monto = $('#monto');
  var rut = $('#rut').val();
  var valido = true;

  if (!valNumber(numero['0'], 1, 50)) {
    valido = false;
  }

  if (!valNumber(monto['0'], 1, 50)) {
    valido = false;
  }

  if (valido) {
    $.ajax({
      url: 'index.php?id=23',
      type: 'post',
      data: 'rutCliente=' + rut + '&numero=' + numero.val() + '&monto=' + monto.val(),
      success: function (data) {
        if (data === "") {
          alert('Se ha guardado el cheque');
          numero.val('');
          monto.val('');
        } else {
          alert('No se ha guardado el cheque');
        }
      }
    });
  } else {
    alert('Faltan datos para guardar el cheque');
  }


}