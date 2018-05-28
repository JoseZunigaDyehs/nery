$(document).ready(function() { 
        

});


function editarPerfil() {

    $.ajax({
      url: 'index.php?id=19',
      type: 'post',
      data:  '&email=' +$("#email") +'&password=' +$("#password") +'&nombres=' +$("#nombres") + '&apellidos=' + $("#apellidos"),
      beforeSend: function () {
        $("#loading-div-background").css({ opacity: .9 });
        $("#loading-div-background").show();
      },     
      success:function(data){
           
        alert("Registro Modificado Exitosamente","mensaje");
        $("#loading-div-background").hide();
                    
          }
     
    });
  }