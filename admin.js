/**
 * Created by Gero on 27/10/2016.
 */
var form=document.querySelector("#agregarzona > form");
var verusuario=document.querySelector("#verusuarios");

var boton_agregar_zona = document.querySelector("#boton_agregar_zona");
var boton_ver_usuarios = document.querySelector("#boton_ver_usuarios");
boton_agregar_zona.addEventListener("click", function () {
    form.style.display="block";verusuario.style.display="none";
});

boton_ver_usuarios.addEventListener("click", function () {
    form.style.display="none";verusuario.style.display="block";
});

//onload o ready
form.style.display="block";verusuario.style.display="none";