/**
 * Created by Gero on 27/10/2016.
 */
$(document).ready(function(){
    var form=$("#agregarzona > form");
    var verusuario=$("#verusuarios");

    var boton_agregar_zona = $("#boton_agregar_zona");
    var boton_ver_usuarios = $("#boton_ver_usuarios");
    var infousuarios = $("#info-usuarios");
    form.css("display","block");
    verusuario.css("display","none");
    boton_agregar_zona.click( function () {
        form.css("display","block");
        verusuario.css("display","none");
    });

    boton_ver_usuarios.click( function () {
        form.css("display","none");
        verusuario.css("display","block")
    });
    $.get(
       "admin-cargar-usuarios.php",
        function(data, status){
            console.log(status);
            infousuarios.html(data);
        }
    );
})



