/**
 * Created by Gero on 16/10/2016.
 */
function verificarCuenta() {
    $.ajax({
        url: "select1.php",
        success: function (result) {
            var bandera = true;
            var json = JSON.parse(result);
            for (cuenta in json.cuenta) {
                if (a == json.cuenta[cuenta]) {
                    bandera = false;
                }
            }
            if (bandera) {
                alert("Ninguna cuenta se llama " + a);
                return true;
            } else {
                alert("Ya hay una cuenta con ese nombre, usa otro");
                return false
            }
        }
    });
}
/**
 * Created by Gero on 16/10/2016.
 */
$(document).ready(function () {
    $('#cuenta').focusout(function () {
        var a = $('#cuenta').val();
        vacio(a);
        verificarCuenta();
    });
    $('#verificar-clave').keyup(function () {
            validarClave();
        }
    );
});


//campo cuenta
function vacio(q) {
    var bandera = true;
    for (var i = 0; i < q.length; i++) {
        if (q.charAt(i) == " ") {
            bandera = false
        }
    }
    if (bandera) {
        alert("ok");
        return bandera;
    } else {

        alert("No puede contener espacio")

        return bandera;
    }
}

function validarClave() {
    var clave1 = $("#clave").val();
    var clave2 = $("#verificar-clave").val();
    if (clave1 == clave2) {
        alert("Ok");
    }
}


function validarTodo() {
    var bandera = false;
    //ningun campo este vacio
    if (
        $("#nombre").val() != "" ||
        $("#email").val() != "" ||
        $("#cuenta").val() != "" ||
        $("#clave").val() != "" ||
        $("#verificar-clave").val() != ""
    ) {
        alert("No pueden haber campos vacios");
        return false;
    }else if (!validarClave()) {
        alert("No coinciden las contraseñas");
        return false;
    } else if(!verificarCuenta()){
        return false;
    }else{
        alert("paso todas las pruebas")
        return true;
    }
}