/**
 * Created by Gero on 16/11/2016.
 */
$(document).ready(function () {
        $("#mi_coleccion").hide();
        $("#otros_coleccion").show();
        $("#btn_mias").click(function () {
            $("#mi_coleccion").show();
            $("#otros_coleccion").hide();
        });
        $("#btn_otros").click(function () {
            $("#mi_coleccion").hide();
            $("#otros_coleccion").show();

        });
    }
);