function buscarPorRut(e) {
  var rut = $('#rut').val();
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
      str += '<td><p>' + cheque.deuda + '</p></td>';
      str += '<td><p>35.000</p></td>';
      str += '<td><p>100.000</p></td>';
      str += '<td><p>348.513</p></td></tr>';
    });
    $('#deuda').find('#tablaDeuda tbody').html(str);
    $('#deuda').removeClass('d-none');
  } else {
    $('#deuda').addClass('d-none');
  }

  window.scrollTo(0, document.getElementById('deuda').offsetTop);

}

function quitarFormatoPesos(input) {
  var texto = input.type === "input" ? input.value : input.text;
  texto.replace('.', '');
  input.type === "input" ? input.value = texto : input.text = texto;
}