/**
 * Created by Gero on 25/10/2016.
 */

$(document).ready(function () {
    var idUsuario = parseInt($(".idusuario").html());
    cargar_select_zonas();
    cargar_zonas_asociadas(idUsuario);

    $('#boton-agregar-zona').click(function () {

        var idZona  = parseInt($("#zona_select :selected").val());

        function obtener_asociacion(idZona, idUsuario) {
            $.get("select2.php",function(data,status){
                console.log(data);
                console.log(status);
            });
        }

        obtener_asociacion(idZona, idUsuario);
        post_en_asociar_zona(idZona, idUsuario);

    });


});
function post_en_asociar_zona(idzona, idusuario) {
    $.post(
        "zonas.php",
        {
            'idzona': idzona,
            'idusuario': idusuario
        },
        function (data, status) {
            if(status=="success"){
                cargar_zonas_asociadas(idusuario);
             //   console.log(data);
             //   console.log(status);
            }else{
                console.log("Algo salio mal");
            }
        }
    )
}
function obtener_idzona(descripcion) {
    $.post(
        "zonas.php",
        {
            'descripcion': descripcion
        },
        function (data, status) {
            if (status == "success") {
                console.log(data);
                return data;
            } else {
                console.log("No se obtuvo idZona");
            }
        });
}

function cargar_select_zonas() {
    $.get("zonas.php", function (data, status) {

        if (status = 200) {
            $("#resultado-zonas").html(data);
        } else {
            $("#resultado-zonas").html("Error al cargar las zonas");
        }


    });
}

function cargar_zonas_asociadas(idusuario){
     var url='asociar.php?idusuario='+idusuario;
    $.get(url, function(data,status){
        console.log(data);
        $(".zonas_elegidas").html(data);
    });
}

function borrar(item){
    //console.log(item.id);
    var zona = (item.id).slice(7);
    console.log(zona);
    var idZona = obtener_idzona(zona);
    console.log(idZona);
    var url="borrar_zona.php?idzona="+idZona;
    $.get(url, function(data, status){
        if(status=="success"){
            console.log(data);
           cargar_zonas_asociadas(data);
        }


    });
}