$(document).ready(function() { 


});


function editarPerfil(usuarios) {

    $.ajax({
      url: 'index.php?id=19',
      type: 'post',
      data:  '&email=' +usuarios.email +'&password=' + usuarios.password +'&nombres=' + usuarios.nombre + '&apellidos=' + usuarios.apellido ,
      beforeSend: function () {
        $("#loading-div-background").css({ opacity: .9 });
        $("#loading-div-background").show();
      },     
     
    });
  }