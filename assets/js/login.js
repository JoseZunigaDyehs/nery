$(document).ready(function () {

    $("#txtLogin").focus();
    $("#txtPass").on('keyup', function (e) {
        if (e.keyCode == 13) {
            $("#btnLogin").click();
        }
    });
    $("#btnLogin").click(function () {
        var usuario = $('#txtLogin').val();
        var pass = $('#txtPass').val();
        var valido = true;

        if(!usuario){
            $('#txtLogin').siblings('.error').removeClass('d-none');
            valido = false;
        }else{
            $('#txtLogin').siblings('.error').addClass('d-none');
        }

        if(!pass){
            $('#txtPass').siblings('.error').removeClass('d-none');
            valido = false;
        }else{
            $('#txtPass').siblings('.error').addClass('d-none');
        }

        if(valido){
            fn_traeDatos($("#txtLogin").val(), $("#txtPass").val());
        }else{
            return false;
        }
    });


});
function fn_traeDatos(v_login, v_password) {
    $.ajax({
        url: 'index.php?id=0', type: 'post', data: 'login=' + v_login + '&pass=' + v_password, dataType: "json", cache: false,
        success: function (data) {
            if (data == "1") {
                window.location.replace("index.php?id=12");
            }
        },
        error: function(err){
            alert('El usuario o password son incorrectos');
        }
    });
}