$(document).ready(function() { 

    
    
});


function editarPerfil(usuario) {

    $.ajax({
      url: 'index.php?id=19',
      type: 'post',
      data:  '&idusuario=' +usuario.idusuario +'&nombreusuario=' + usuario.nombreusuario + '&password=' + usuario.password + '&nombre=' + usuario.nombre + '&apellido=' + usuario.apellido ,
      beforeSend: function () {
        $("#loading-div-background").css({ opacity: .9 });
        $("#loading-div-background").show();
      },     
     
    });
  }