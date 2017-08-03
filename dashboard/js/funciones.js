//Función para mostrar/ocultar los comentarios
function Desplegar() {
    if (document.getElementById("comentarios").style.visibility == "visible") {
        document.getElementById("comentarios").style.visibility = "hidden";
    } else {
        document.getElementById("comentarios").style.visibility = "visible";
    }
}

function DesplegarEdicion() {
    if (document.getElementById("edicionNoticia").style.visibility == "visible") {
        document.getElementById("edicionNoticia").style.visibility = "hidden";
    } else {
        document.getElementById("edicionNoticia").style.visibility = "visible";
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

function popUp(titulo, imagen, RS) {
    var ventana = window.open("", "Comparte la noticia en Twitter", 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=1,width=300,height=300,left=450,top=350');
    ventana.document.write("<head><meta charset='UTF-8'/><title>"+RS+"</title><link rel='icon' href='./Imagenes/favicon.ico' type='image/x-icon'/></head><p>Se publicara en "+RS+" el siguiente mensaje:</p><img src=./"+imagen+" alt='Zelda' width='200' height='100' />"+"<p>"+titulo+"</p><p>Via @MadGamer</p><button name='aceptar' onclick='window.close()'>Aceptar</button>");
}

//Función para buscar noticias
function buscarNot(){
    if(document.getElementById('buscador').value!=""){
        var pattern = document.getElementById('buscador').value;
    }
    var solicitud = new XMLHttpRequest();
    var data  = new FormData();
    var url = 'index.php?q='+pattern;

    data.append("pattern", pattern);
    solicitud.open('POST',url, true);
    solicitud.send(data);

    solicitud.addEventListener('load', function(e){

        var cajadatos = document.getElementById('resultados');
        cajadatos.innerHTML = e.target.responseText;
        
    }, false);
}

window.addEventListener('load', function(){
    document.getElementById('buscador').addEventListener('input', buscarNot, false);
}, false);

//function buscarNot(){
//    var xmlhttp;
//    var n=document.getElementById('bus').value;
//
//    if(n==''){
//        document.getElementById("resultados").innerHTML="";
//        return;
//    }
//
//    if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
//        xmlhttp=new XMLHttpRequest();
//    }
//    else{// code for IE6, IE5
//        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//    }
//    xmlhttp.onreadystatechange=function(){
//        if (xmlhttp.readyState==4 && xmlhttp.status==200){
//            document.getElementById("resultados").innerHTML=xmlhttp.responseText;
//        }
//    }
//    xmlhttp.open("GET","navigator.php?q="+n,true);
//    xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
//    xmlhttp.send(null)
//
//}

















