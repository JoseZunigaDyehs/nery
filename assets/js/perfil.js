$(document).ready(function() { 

  $("#email").focus();
  $("#email").on('keyup',function(e){
      if (e.keyCode == 13){
          $("#btnModificar").click();
    //alert("Buscar");
      }
  });    
  $("#btnModificar").click(function(){
    var nombre = $("#nombres").val();
    var apellido = $("#apellidos").val();
    var email = $("#email").val();
    var password = $("#password").val();
    
    fn_editarPerfil(nombre,apellido,email,password);
  /*alert($("#txtNombre").val());
  alert($("#txtApellido").val());
  alert($('input[name=sexo]:checked').val());*/
  //alert($("#sexo").val());
  //alert("buscar");
  });


  });


function fn_editarPerfil(nombre,apellido,email,password) {

    $.ajax({
      url: 'index.php?id=19',
      type: 'post',
      data:  'email=' + email +'&password=' + password +'&nombres=' + nombre + '&apellidos=' + apellido,
      beforeSend: function () {
        $("#loading-div-background").css({ opacity: .9 });
        $("#loading-div-background").show();
      },     
      success:function(data){
           debugger
        alert("Registro Modificado Exitosamente","mensaje");
        $("#loading-div-background").hide();
                    
          }
     
    });
  }