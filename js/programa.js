// .:: Validación de caracteres Javascript ::.

window.onload = function() {
    var nombre = document.getElementById("nombre");

    nombre.onkeypress = restringir;
}

function restringir(event){
    var caracteresPermitidos;
    switch(this.type){
        case "text":
            caracteresPermitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
            break;
        case "number":
            caracteresPermitidos = "0123456789";
            break;
        case "email":
            caracteresPermitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@."
            break;
    }
    var letra = String.fromCharCode(event.charCode);
    return caracteresPermitidos.indexOf(letra) != -1;
}