/**
 * Created by Gero on 25/10/2016.
 */
function post_en_asociar_zona(idzona, idusuario) {
    $.post(
        "zonas.php",
        {
            'idzona': idzona,
            'idusuario': idusuario
        },
        function (data, status) {
            if (status == 200) {
                console.log("todo bien");
            } else {
                console.log("No se agrego asociacion");
            }
        })
}
function obtener_idzona(descripcion) {
    $.post(
        "zonas.php",
        {
            'descripcion': descripcion
        },
        function (data, status) {
            if(status==200){
                console.log(data);
            }else{
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
