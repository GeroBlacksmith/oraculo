/**
 * Created by Gero on 16/10/2016.
 */
function verificarCuenta() {
    var bandera=false;
    $.ajax({
        url: "select1.php",
        success: function (result) {

            var json = JSON.parse(result);
            for (cuenta in json.cuenta) {
                if (a == json.cuenta[cuenta]) {
                    bandera = false;
                }
            }
            if (bandera) {
                //alert("Ninguna cuenta se llama " + a);
                bandera= true;
            } else {
                //alert("Ya hay una cuenta con ese nombre, usa otro");
                bandera= false
            }
        }
    });
    return bandera;
}
/**
 * Created by Gero on 16/10/2016.
 */
$(document).ready(function () {

    $('#cuenta').focusout(function () {
        var a = $('#cuenta').val();
        var bandera = true;
        vacio(a);
        $.ajax({
            url: "select1.php",
            success: function (result) {

                var json = JSON.parse(result);
                for (cuenta in json.cuenta) {
                    if (a == json.cuenta[cuenta]) {
                        bandera = false;
                    }
                }
                if (bandera) {
                    //alert("Ninguna cuenta se llama " + a);
                    bandera=true;
                } else {
                    //alert("Ya hay una cuenta con ese nombre, usa otro");
                    bandera=false
                }
            }
        });
        return bandera;
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
        //alert("ok");
        return bandera;
    } else {

        //alert("No puede contener espacio")

        return bandera;
    }
}

function validarClave() {
    var clave1 = $("#clave").val();
    var clave2 = $("#verificar-clave").val();
    if (clave1 == clave2) {
        //alert("Ok");
    }
}


function validarTodo() {
    var bandera = false;
    //ningun campo este vacio
    if (
        $("#nombre").val() == "" ||
        $("#email").val() == "" ||
        $("#cuenta").val() == "" ||
        $("#clave").val() == "" ||
        $("#verificar-clave").val() == ""
    ) {
        //alert("No pueden haber campos vacios");
        bandera= false;
    }else if (!validarClave()) {
        //alert("No coinciden las contraseñas");
        bandera=false;
    } else if(!verificarCuenta()){
        bandera=false;
    }else{
        //alert("paso todas las pruebas")
        bandera=true;
    }
    return bandera;
}