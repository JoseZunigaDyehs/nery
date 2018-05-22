$(document).ready(function() { 

    
    
});


function editarPerfil(usuario) {
debugger;
    $.ajax({
      url: 'index.php?id=19',
      type: 'post',
      data: 'nombreusuario=' + usuario.nombreusuario + '&password=' + usuario.password + '&nombre=' + usuario.nombre + '&apellido=' + usuario.apellido ,
      beforeSend: function () {
        $("#loading-div-background").css({ opacity: .9 });
        $("#loading-div-background").show();
      },     
     
    });
  }