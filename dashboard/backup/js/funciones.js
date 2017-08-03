//Función para mostrar/ocultar los comentarios
function Desplegar() {
    if (document.getElementById("comentarios").style.visibility == "visible") {
        document.getElementById("comentarios").style.visibility = "hidden";
    } else {
        document.getElementById("comentarios").style.visibility = "visible";
    }
}

//Función para añadir nuevo comentario
function NewComment() {
    var autor = document.getElementById("autor").value;
    var texto = document.getElementById("textComment").value;
    var correo = document.getElementById("email").value;
    var date = new Date();
   
    var listaComentarios = document.getElementById("listaComentarios");
    var ul = document.createElement("ul");
    var li1 = document.createElement("li");
    li1.innerHTML = autor + ", escribió:";
    var li2 = document.createElement("li");
    var minutos;
    if (date.getMinutes() < 10) {
        minutos = "0" + date.getMinutes();
    } else {
        minutos = date.getMinutes();
    }
    var horas;
    if (date.getHours() < 10) {
        horas = "0" + date.getHours();
    } else {
        horas = date.getHours();
    }
    li2.innerHTML = date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear() + " - " + horas + ":" + minutos;
    var li3 = document.createElement("li");
    var p = document.createElement("p");
    p.innerHTML = texto;
    var hr = document.createElement("hr");

    ul.appendChild(li1);
    ul.appendChild(li2);
    ul.appendChild(li3);
    listaComentarios.appendChild(hr);
    li3.appendChild(p);
    listaComentarios.appendChild(ul);
    listaComentarios.appendChild(hr);

    document.getElementById("autor").value = "";
    document.getElementById("email").value = "";
    document.getElementById("textComment").value = "";
    
    return false;
}

function limpia(){
    document.getElementById("email").value = "";
}

//Número de asteriscos
function asteriscos(prohibida) {
    var asteris = "";
    for (var i = 0; i<prohibida.length; i++){
        asteris += "*";
    }
    return asteris;
}

//Función filtro para palabras prohibidas
function comprobar() {
    // Pasar sacar el codigo de cada tecla
    /*var tecla = (document.all) ? e.keyCode : e.which;*/
                
    var frase = document.getElementById("textComment").value;
    frase = frase.toLowerCase();
    var prohibidas = ["puta", "puto", "mierda", "cabron", "joder", "polla", "capullo", "coño", "maricon", "maricón", "culo"];
    var i;
    for (i = 0; i < prohibidas.length; i++) {
        frase = frase.replace(prohibidas[i], asteriscos(prohibidas[i]));
        document.getElementById("textComment").value = frase;
    }
}