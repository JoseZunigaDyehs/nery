$(document).ready(function() { 

    
    
});


function fn_editarPerfil(usuario, editores) {

    $.ajax({
      url: 'index.php?id=19',
      type: 'post',
      data: 'nombre=' + usuario.nombre + '&apellido=' + usuario.apellido + '&nombreusuario=' + usuario.nombreusuario + '&password=' + usuario.password,
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