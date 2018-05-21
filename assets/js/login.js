$(document).ready(function() { 

    $("#txtLogin").focus();
    $("#txtPass").on('keyup',function(e){
    if (e.keyCode == 13){
        $("#btnLogin").click();
        //alert("Buscar");
    }
    });    
    $("#btnLogin").click(function(){
    fn_traeDatos($("#txtLogin").val(),$("#txtPass").val() );
    //alert("buscar");
});


});   
function fn_traeDatos(v_login, v_password){
//alert(v_login);
//alert(v_password);
$.ajax({url:'index.php?id=0',type:'post',data: 'login=' + v_login + '&pass=' + v_password,dataType:"json",cache:false,
//$.ajax({url:'index.php?id=1&like='+$("#txtPersona").val(),type:'post',cache:false,
    beforeSend: function () {
        $("#loading-div-background").css({ opacity: .9 });
        $("#loading-div-background").show();
    },            
    success:function(data){
       
        //alert(data);
        if(data == "1"){
             $("#loading-div-background").hide();
            jAlert("Login Correcto","Mensaje");
            window.location.replace("index.php?id=3");
        } else {
            jAlert("No se encontraron registros, segun consulta..!!","Mensaje");
            $("#loading-div-background").hide();
            $("#txtLogin").val('');
            $("#txtPass").val('');
        }            
    }
});
}