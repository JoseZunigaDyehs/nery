function buscarPorRut(e) {
  var rut = $('#rut').val();

  //método que trae y pinta cheques de clientes
  $.ajax({
    url: 'index.php?id=18',
    type: 'post',
    data: 'rutCliente=' + rut,
    success: function (data) {
      if(data.trim()!==""){
        var tablaBody = $('#cheques').find('tbody');
        tablaBody.html(data);
        $('#cheques').removeClass('d-none');

        $.ajax({
          url: 'index.php?id=20',
          type: 'post',
          data: 'rutCliente=' + rut,
          success: function (data) {
            var cliente = JSON.parse(data);
            $('#nombreCliente').text(cliente.nombres+' '+cliente.apellidos);
            $('#rutCliente').val(cliente.rutcliente);
          }
        });

      }else{
        alert('No existen cheques para mostrar');
      }
    }
  });

}

function guardarCheque(){
  var numero = $('#numero').val();
  var monto = $('#monto').val();
  var rut = $('#rut').val();

  $.ajax({
    url: 'index.php?id=23',
    type: 'post',
    data: 'rutCliente=' + rut +'&numero=' + numero + '&monto=' + monto,
    success: function (data) {
      var cliente = JSON.parse(data);
      $('#nombreCliente').text(cliente.nombres+' '+cliente.apellidos);
    }
  });
}