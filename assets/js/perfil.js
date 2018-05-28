$(document).ready(function () {

  $("#email").focus();

  $("#email").on('keyup', function (e) {
    if (e.keyCode == 13) {
      $("#btnModificar").click();
    }
  });

  $("#btnModificar").click(function () {

    var nombre = $("#nombres");
    var apellido = $("#apellidos");
    var nombreUsuario = $("#nombreUsuario");
    var password = $("#password");
    var valido = true;

    if(!valTexto(nombre, 3, 50)){
      valido = false;
    }
    if(!valTexto(apellido, 3, 50)){
      valido = false;
    }
    if(!valTexto(nombreUsuario,4,50)){
      valido = false;
    }
    if(!valTexto(password, 4, 9)){
      valido = false;
    }
    if(valido){
      fn_editarPerfil(nombre.val(), apellido.val(), nombreUsuario.val(), password.val());
    }else{
      return false;
    }

  });


});


function fn_editarPerfil(nombre, apellido, nombreUsuario, password) {
  var id = $('#id').text();
  $.ajax({
    url: 'index.php?id=19',
    type: 'post',
    data: 'nombreUsuario=' + nombreUsuario + '&password=' + password + '&nombres=' + nombre + '&apellidos=' + apellido + '&id=' + id,
    success: function (data) {
      if(data===""){
        alert("Se ha modificado el perfil");
      }else{
        alert("No se ha podido modificar el perfil");
      }
    }

  });
}