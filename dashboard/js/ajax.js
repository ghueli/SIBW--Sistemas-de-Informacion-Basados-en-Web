////Función para buscar noticias
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
//    xmlhttp.send(null);
//
//}