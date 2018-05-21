function buscarPorRut(e) {

  var rut = $('#rut').val();

  //método que trae y pinta cheques de clientes
  $.ajax({
    url: 'index.php?id=18',
    type: 'post',
    data: 'rutCliente=' + rut,
    success: function (data) {
      //No se cómo trae las filas
      var tablaBody = $('#cliente').find('tbody');
      var str = '';
      str += '<td><p class="numero">251325</p></td>';
      str += '<td><p class="fecha">22-05-2018</p></td>';
      str += '<td><p class="motivo">No pago algo</p></td>';
      str += '<td><p class="deuda">1.232.152</p></td>';
      str += '<td class="d-flex justify-content-center">';
      str += '<div class="custom-control custom-checkbox seleccionado" onchange="generarCalculos(this)">';
      str += '<input type="checkbox" class="custom-control-input" id="1" />';
      str += '<label class="custom-control-label" for="1"></label></div>';
      str += '</td></tr>';
      tablaBody.html(str);
    }
  });

  $('#cheques').removeClass('d-none');
}

function generarCalculos(e) {
  var tabla = $(e).closest('tbody');
  var filas = tabla.find('tr');
  var cheques = [];
  $.each(filas, function (i, fila) {
    var seleccionado = $(fila).find('.seleccionado').find('input')["0"].checked;
    if (seleccionado) {
      var numeroDoc = $(fila).find('.numero').text();
      var fecha = $(fila).find('.fecha').text();
      var motivo = $(fila).find('.motivo').text();
      var deuda = $(fila).find('.deuda').text();
      var cheque = {
        numeroDoc: numeroDoc,
        fecha: fecha,
        motivo: motivo
      }
      var nuevaFila = {
        cheque: cheque,
        deuda: deuda
      }
      cheques.push(nuevaFila);
    }
  });

  if (cheques.length > 0) {
    $('#deuda').addClass('d-none');
    var str = '';
    $.each(cheques, function (i, cheque) {
      str += '<tr><th scope="row ">' + (i + 1) + '</th>';
      str += '<td><p>N° Doc: ' + cheque.cheque.numeroDoc + '</p>';
      str += '<p>Fecha protesto: ' + cheque.cheque.fecha + '</p>';
      str += '<p>Motivo: ' + cheque.cheque.motivo + '</p></td>';
      str += '<td><p class="deuda">' + cheque.deuda + '</p></td>';
      str += '<td><p>35.000</p></td>';
      str += '<td><p>100.000</p></td>';
      str += '<td><p>348.513</p></td></tr>';
    });
    $('#deuda').find('#tablaDeuda tbody').html(str);
    $('#deuda').removeClass('d-none');
    calculosTablaDeuda(cheques);
  } else {
    $('#deuda').addClass('d-none');
  }
  window.scrollTo(0, document.getElementById('deuda').offsetTop);

}

function calculosTablaDeuda(cheques){
  debugger;
  var valores = {};
  var sumaDeuda = 0;
  $.each(cheques,function(i,cheque){
    var deuda = quitarFormatoPesos(cheque.deuda);
    sumaDeuda += deuda;
  });
  var tablaFoot = $('#deuda').find('#tablaDeuda tfoot tr');
  sumaDeuda = formatNumber(sumaDeuda);
  tablaFoot.find('.deuda').text(sumaDeuda);
}

function quitarFormatoPesos(valor) {
  valor = valor.replace(/\./g,'');
  return parseInt(valor);
}