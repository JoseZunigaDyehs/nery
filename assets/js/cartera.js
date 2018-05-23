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
        var deudas = tablaBody.find('.deuda');
        $.each(deudas,function(i,val){
          $(val).text(formatNumber($(val).text()));
        });

        $.ajax({
          url: 'index.php?id=20',
          type: 'post',
          data: 'rutCliente=' + rut,
          success: function (data) {
            var cliente = JSON.parse(data);
            $('#nombreCliente').text(cliente.nombres+' '+cliente.apellidos);
          }
        });

      }else{
        alert('No existen cheques para mostrar');
      }
    }
  });

}

function fillTablaCheques(e) {
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
      var deudaSinFormato = quitarFormatoPesos(cheque.deuda);
      str += '<tr><th scope="row ">' + (i + 1) + '</th>';
      str += '<td><p class="numero" data-numero="'+cheque.cheque.numeroDoc+'">N° Doc: ' + cheque.cheque.numeroDoc + '</p>';
      str += '<p>Fecha protesto: ' + cheque.cheque.fecha + '</p>';
      str += '<p>Motivo: ' + cheque.cheque.motivo + '</p></td>';
      str += '<td><p class="deuda">' + cheque.deuda + '</p></td>';
      str += '<td><p>' + formatNumber((deudaSinFormato*0.1).toFixed(0)) + '</p></td>';
      str += '<td><p>' + formatNumber((deudaSinFormato*1.1).toFixed(0)) + '</p></td></tr>';
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
  
  var valores = {};
  var sumaDeuda = 0;
  var sumaInteres = 0;
  var sumaTotal = 0;
  $.each(cheques,function(i,cheque){
    var deuda = quitarFormatoPesos(cheque.deuda);
    sumaDeuda += deuda;
    sumaInteres += parseInt((deuda*0.1).toFixed(0));
    sumaTotal += parseInt((deuda*1.1).toFixed(0));
  });
  var tablaFoot = $('#deuda').find('#tablaDeuda tfoot tr');
  sumaDeuda = formatNumber(sumaDeuda);
  sumaInteres = formatNumber(sumaInteres);
  sumaTotal = formatNumber(sumaTotal);
  tablaFoot.find('.deuda').text(sumaDeuda);
  tablaFoot.find('.interes').text(sumaInteres);
  tablaFoot.find('.total').text(sumaTotal);
}

function quitarFormatoPesos(valor) {
  valor = valor.replace(/\./g,'');
  return parseInt(valor);
}

function pagarCheques(){

  var tabla = $('#tablaDeuda');
  var filas = tabla.find('tbody tr');
  var cheques = [];
  $.each(filas,function(i,val){
    var cheque = $(val).find('.numero')[0].dataset.numero;

    $.ajax({
      url: 'index.php?id=21',
      type: 'post',
      data: 'numDocumento=' + cheque,
      success: function (data) {
        $(val).remove();
        mostrarTabla(tabla);
        if((filas.length-1)===i){
          $('#deuda').addClass('d-none');
          alert('Se pagaron los cheques');
        }
      }
    });


  });
}