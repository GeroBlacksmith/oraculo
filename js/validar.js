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
                    bandera = true;
                } else {
                    //alert("Ya hay una cuenta con ese nombre, usa otro");
                    bandera = false
                }
            }
        });
        return bandera;
    });
    $('#verificar-clave').keyup(function () {
            validarClave();
        }
    );


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
        return (clave1 == clave2);
    }


    function validarTodo() {
        var bandera = true;
        //ningun campo este vacio
        if ($("#nombre").val() == "") {
            $('i#i_error_nombre').show();
            $('#div_error_nombre').html("No puede estar vacio");
            bandera = false;
        }
        if ($("#email").val() == "") {
            $('i#i_error_email').show();
            $('#div_error_email').html("No puede estar vacio");
            bandera = false;
        }
        if ($("#cuenta").val() == "") {
            $('i#i_error_cuenta').show();
            $('#div_error_cuenta').html("No puede estar vacio");
            bandera = false;
        }
        if ($("#clave").val() == "") {
            $('i#i_error_clave').show();
            $('#div_error_clave').html("No puede estar vacio");
            bandera = false;
        }
        if ($("#verificar-clave").val() == "") {
            $('i#i_error_repetir_clave').show();
            $('#div_error_repetir_clave').html("No puede estar vacio");
            bandera = false;
        }

        if (!validarClave()) {
            $('i#i_error_repetir_clave').show();
            $('#div_error_repetir_clave').html("No coinciden las claves");
            bandera = false;
        }

        return bandera;
    }

    function mensajes() {
        $('i#i_error_nombre')
        $('i#i_error_cuenta')
        $('i#i_error_mail')
        $('i#i_error_clave')
        $('i#i_error_repetir_clave')

    }

    function error_nombre_vacio() {
        $('i#i_error_nombre').show();
        $('#div_error_nombre').html("No puede estar vacio");
    }

    function limpiar() {
        $('i#i_error_nombre').hide();
        $('i#i_error_cuenta').hide();
        $('i#i_error_mail').hide();
        $('i#i_error_clave').hide();
        $('i#i_error_repetir_clave').hide();

        $('#div_error_nombre').hide();
        $('#div_error_clave').hide();
        $('#div_error_cuenta').hide();
        $('#div_error_email').hide();
        $('#div_error_repetir_clave').hide();

    }
})
