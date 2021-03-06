$(document).ready(function () {
  refreshFunction();
});

function refreshFunction() {
  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })
}

// ********** VALIDACIONES ************

/// e = elemento,
/// min = minima cantidad de texto,
/// max = maxima cantidad de texto
function valTexto(e, min, max) {
  let valor = $(e).val();
  var error = $(e).siblings('.error');
  var valido = true;

  if (valor.trim() === "") {
    error.text('No debe estar vacío');
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  } else if (valor.length < min) {
    error.text('Mínimo de caracteres: ' + min);
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  } else if (valor.length > max) {
    error.text('Máximo de caracteres: ' + max);
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  } else {
    error.addClass('d-none');
    $(e).removeClass('is-invalid');
  }
  return valido;
}

//Valida números
function valNumber(e, min, max) {
  let valor = e.value;
  var reg = new RegExp('^[0-9]+$');
  var error = $(e).siblings('.error');
  var valido = true;

  if (valor === undefined) {
    error.text('No debe estar vacío');
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  }else if(valor.trim() === "") {
    error.text('No debe estar vacío');
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  } else if (!reg.test(valor)) {
    e.value = valor.substring(0, valor.length - 1)//quitar ultimo caracter
    error.text('Ingrese sólo números');
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  } else if (valor.length < min) {
    error.text('Mínimo de caracteres: ' + min);
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  } else if (valor.length > max) {
    error.text('Máximo de caracteres: ' + max);
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  } else {
    error.addClass('d-none');
    $(e).removeClass('is-invalid');
  }
  return valido;
}

//Valida los select
function valSelect(e) {
  let valor = $(e).val();
  var error = $(e).siblings('.error');
  var valido = true;

  if (valor.trim() === "Seleccione") {
    error.text('Debe estar seleccionado');
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    valido = false;
  } else {
    error.addClass('d-none');
    $(e).removeClass('is-invalid');
  }
  return valido;
}

//Valida Emails
function valEmail(e) {
  var valor = $(e).val();
  var error = $(e).siblings('.error');

  if (!valor) {
    error.text('No debe estar vacío');
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    return false;
  } else if (!/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i.test(valor)) {
    error.text('Debe ingresar email válido');
    error.removeClass('d-none');
    $(e).addClass('is-invalid');
    return false;
  } else {
    error.addClass('d-none');
    $(e).removeClass('is-invalid');
    return true;
  }
}

//Valida el Rut
function checkRut(rut) {
  //
  // Despejar Puntos
  var valor = rut.value.replace('.', '');
  // Despejar Guión
  valor = valor.replace('-', '');

  // Aislar Cuerpo y Dígito Verificador
  cuerpo = valor.slice(0, -1);
  dv = valor.slice(-1).toUpperCase();

  // Formatear RUN
  rut.value = cuerpo + '-' + dv

  //p de error
  var error = $(rut).siblings('.error');

  // Si no cumple con el mínimo ej. (n.nnn.nnn)
  if (cuerpo.length < 7) {
    error.text('RUT Incompleto');
    error.removeClass('d-none');
    $(rut).addClass('is-invalid');
    return false;
  }

  // Calcular Dígito Verificador
  suma = 0;
  multiplo = 2;

  // Para cada dígito del Cuerpo
  for (i = 1; i <= cuerpo.length; i++) {

    // Obtener su Producto con el Múltiplo Correspondiente
    index = multiplo * valor.charAt(cuerpo.length - i);

    // Sumar al Contador General
    suma = suma + index;

    // Consolidar Múltiplo dentro del rango [2,7]
    if (multiplo < 7) { multiplo = multiplo + 1; } else { multiplo = 2; }

  }

  // Calcular Dígito Verificador en base al Módulo 11
  dvEsperado = 11 - (suma % 11);

  // Casos Especiales (0 y K)
  dv = (dv == 'K') ? 10 : dv;
  dv = (dv == 0) ? 11 : dv;

  // Validar que el Cuerpo coincide con su Dígito Verificador
  if (dvEsperado != dv) {
    error.text('RUT Inválido');
    error.removeClass('d-none');
    $(rut).addClass('is-invalid');
    return false;
  }

  // Si todo sale bien, eliminar errores (decretar que es válido)
  rut.setCustomValidity('');
  error.addClass('d-none');
  $(rut).removeClass('is-invalid');
  return true;
}

//Elimina la fila
function eliminar(e) {
 var tabla = $(e).closest('table');
 fn_eliminarCliente(e,tabla);
}

// Recorre todos los input con clase editar y los muestra
// Al mismo tiempo que esconde 
function editar(e) {
  var editores = $(e).closest('tr').find('.editar');
  $.each(editores, function (i, editor) {
    //Si es la ultima columna
    if (editores.length - 1 === i) {
      $(editor).removeClass('d-none');
      $(editor).siblings('.btnEliminar').addClass('d-none');
      $(editor).siblings('.btnEditar').addClass('d-none');
    } else {
      $(editor).removeClass('d-none');
      $(editor).siblings('p').addClass('d-none');
    }
  })
}

//Guarda la fila
function guardar(e) {
  var editores = $(e).closest('tr').find('.editar');//Todos los input con clase editar
  var valido = true;

  $.each(editores, function (i, editor) {//recorrer todos los input
    //Si es la ultima columna
    if (editores.length - 1 !== i) {
      //Si el error no tiene la clase d-none
      //Se saldra de inmediato, ya ha validado los demás al modificarlos
      if (!$(editor).siblings('.error').hasClass('d-none')) {
        valido = false;
        alert('Debe ingresar todos los campos válidos');
        return false;
      }
    }
  })
  //Recorre de nuevo para sacar esconder los input y mostrar lo nuevo
  if (valido) {//Si no hay errores
    var rut = $(e).closest('tr').find('.rut');
    var nombres = $(e).closest('tr').find('.nombres');
    var apellidos = $(e).closest('tr').find('.apellidos');
    var email = $(e).closest('tr').find('.email');
    var telefono = $(e).closest('tr').find('.telefono');


    var cliente = {
      "rut": rut.val(),
      "nombres": nombres.val(),
      "apellidos":apellidos.val(),
      "email":email.val(),
      "telefono":telefono.val()
    }
    fn_editarCliente(cliente, editores);
  }
}

//Funcion que agrega, llenando tabla
function agregar() {

  var valido = validarTodo();

  if (!valido) {
    alert('Hay campos no válidos')
    return false;
  } else {
    llenarTabla(valido);
    return true;
  }
}

//Muestra tabla si tiene mas de una fila, se le pasa la tabla, y un valor si es producto
function mostrarTabla(tabla, producto) {
  var filas = tabla.find('tbody tr');
  if (filas.length > 0) {//Si tiene filas
    tabla.removeClass('d-none');
    if (producto !== undefined) {//si es producto      
      // mostrarVacio(undefined,false);
      $('#vacio').removeClass('d-flex');
      $('#vacio').addClass('d-none');
      tabla.closest('.productos').removeClass('d-none');
      tabla.closest('.productos').addClass('d-flex');
      tabla.closest('.productos').siblings('.productos').removeClass('d-none');
      tabla.closest('.productos').siblings('.productos').addClass('d-flex');
    }

  } else {
    tabla.addClass('d-none');
    if (producto !== undefined) {//si es producto
      // mostrarVacio(tabla,true);
      $('#vacio').addClass('d-flex');
      $('#vacio').removeClass('d-none');
      tabla.closest('.productos').addClass('d-none');
      tabla.closest('.productos').removeClass('d-flex');
      tabla.closest('.productos').siblings('.productos').addClass('d-none');
      tabla.closest('.productos').siblings('.productos').removeClass('d-flex');
    }
  }

}

function formatNumber(num) {
  if (!num || num == 'NaN') return '-';
  if (num == 'Infinity') return '&#x221e;';
  num = num.toString().replace(/\$|\,/g, '');
  if (isNaN(num))
    num = "0";
  sign = (num == (num = Math.abs(num)));
  num = Math.floor(num * 100 + 0.50000000001);
  cents = num % 100;
  num = Math.floor(num / 100).toString();
  if (cents < 10)
    cents = "0" + cents;
  for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
    num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
  return (((sign) ? '' : '-') + num);
}

//DOCUMENT READY
$('document').ready(function () {
  //Mostrar o no las tablas si es que tienen filas
  mostrarTabla($('#tablaOP'));
});