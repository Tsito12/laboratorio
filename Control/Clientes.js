
$(document).ready(function(){
  if(document.getElementById("accion")!=null){
    document.getElementById("accion").value="guardar";
  }
  
  verificarCampos();
  $("input").on('change focus keypress', function(event){
    if(event.target.id!="buscar"){
      verificarCampos();
    }
    
  });

  if(sessionStorage.getItem('codigo')!=null){
    llenarFormulario();
    document.getElementById("accion").value="editar";
  } else if(document.getElementById("accion")!=null){
    document.getElementById("accion").value="guardar";
  }


    $('#imagen').on('change', function(){
      var accion = $('#accion').val();
      $('#accion').val("subirImg");
        var imagen = document.getElementById("imagen").value;
        console.log(imagen);
        //var datos = new FormData();
        //datos.append("imagen",imagen);
        $.ajax({
            // Your server script to process the upload
            url: '../Control/Clientes.php',
            type: 'POST',
        
            // Form data
            data: new FormData($('form')[0]),
        
            // Tell jQuery not to process data or worry about content-type
            // You *must* include these options!
            cache: false,
            contentType: false,
            processData: false,
        
            // Custom XMLHttpRequest
            xhr: function () {
              var myXhr = $.ajaxSettings.xhr();
              if (myXhr.upload) {
                // For handling the progress of the upload
                /*
                myXhr.upload.addEventListener('progress', function (e) {
                  if (e.lengthComputable) {
                    $('progress').attr({
                      value: e.loaded,
                      max: e.total,
                    });
                  }
                }, false);*/
              }
              console.log(myXhr);
              console.log(myXhr['response']);
              //document.getElementById("resultado").innerText=myXhr['response'];
              document.getElementById("accion").value=accion;
              return myXhr;
            },
            success:function(r){
              if(r=="Datos Editados correctamente"){
                sessionStorage.clear();
                $('form')[0].reset();
                //document.getElementById("accion").value="guardar";
              }
              //document.getElementById("resultado").innerText=r;
              let nombreimg = imagen.replace("C:\\fakepath\\","");
              document.getElementById("imgUsr").src="../Uploads/"+nombreimg;
              $('#rutaimg').val("Uploads/"+nombreimg);
              if(r=="Hubo un problema al subir la imagen."||r=="El archivo no es una imagen"){
                document.getElementById("imagen").value="";
                document.getElementById("rutaimg").value="";
                alert(r);
              }
              
              
              //
              //window.location.reload();
            }
          });
    });
    $('#guardarCliente').on('click', function(){
      //$('#accion').val("guardar");

      if(camposVacios()||!verficarEmail()){
        alert("Algunos campos no estan correctos, favor de revisar");
        return;
      }
      if(document.getElementById("telefono").value!=""){
        if(!verificarTelefono()){
          alertTelefono();
          return;
        }
      }
      if(document.getElementById("rfc").value!=""){
        if(!verificarRFC()||!verficarEmailRFC()){
          alert("Algunos campos no estan correctos, favor de revisar");
          return;
        }
      }
      $.ajax({
        // Your server script to process the upload
        url: '../Control/Clientes.php',
        type: 'POST',
    
        // Form data
        data: new FormData($('form')[0]),
    
        // Tell jQuery not to process data or worry about content-type
        // You *must* include these options!
        cache: false,
        contentType: false,
        processData: false,
    
        // Custom XMLHttpRequest
        xhr: function () {
          var myXhr = $.ajaxSettings.xhr();
          if (myXhr.upload) {
            // For handling the progress of the upload
            /*
            myXhr.upload.addEventListener('progress', function (e) {
              if (e.lengthComputable) {
                $('progress').attr({
                  value: e.loaded,
                  max: e.total,
                });
              }
            }, false);*/
          }
          console.log(myXhr);
          console.log(myXhr['response']);
          //document.getElementById("resultado").innerText=myXhr['response'];
          //document.getElementById("accion").value="guardar";
          return myXhr;
        },
        success:function(r){
          if(r=="Datos guardados correctamente"||r=="Datos Editados correctamente"){
            $('form')[0].reset();
            document.getElementById("accion").value="guardar";
            alert(r);
            clienteAgregado=true;
            imprimirCosas();
          }else{
            console.log(r);
          }
          document.getElementById("imgUsr").src="";
          
          //window.location.reload();
        }
      });
    });
});

function editar(elmnt){
  var codigo        = elmnt.parentElement.parentElement.getElementsByClassName("id")[0].innerHTML;
  var nombre        = elmnt.parentElement.parentElement.getElementsByClassName("nombre")[0].innerHTML;
  var apellidoP     = elmnt.parentElement.parentElement.getElementsByClassName("apellidoP")[0].innerHTML;
  var apellidoM     = elmnt.parentElement.parentElement.getElementsByClassName("apellidoM")[0].innerHTML;
  var edad          = elmnt.parentElement.parentElement.getElementsByClassName("edad")[0].innerHTML;
  var periodo       = elmnt.parentElement.parentElement.getElementsByClassName("periodoE")[0].innerHTML;
  var sexo          = elmnt.parentElement.parentElement.getElementsByClassName("sexo")[0].innerHTML;
  var telefono      = elmnt.parentElement.parentElement.getElementsByClassName("telefono")[0].innerHTML;
  var email         = elmnt.parentElement.parentElement.getElementsByClassName("email")[0].innerHTML;
  var estatura      = elmnt.parentElement.parentElement.getElementsByClassName("estatura")[0].innerHTML;
  var peso          = elmnt.parentElement.parentElement.getElementsByClassName("peso")[0].innerHTML;
  var tipoc         = elmnt.parentElement.parentElement.getElementsByClassName("idtipoc")[0].innerHTML;
  var calle         = elmnt.parentElement.parentElement.getElementsByClassName("calle")[0].innerHTML;
  var colonia       = elmnt.parentElement.parentElement.getElementsByClassName("colonia")[0].innerHTML;
  var poblacion     = elmnt.parentElement.parentElement.getElementsByClassName("poblacion")[0].innerHTML;
  var municipio     = elmnt.parentElement.parentElement.getElementsByClassName("municipio")[0].innerHTML;
  var estado        = elmnt.parentElement.parentElement.getElementsByClassName("estado")[0].innerHTML;
  var codigopostal  = elmnt.parentElement.parentElement.getElementsByClassName("codigopostal")[0].innerHTML;
  var razonf        = elmnt.parentElement.parentElement.getElementsByClassName("razonf")[0].innerHTML;
  var emailf        = elmnt.parentElement.parentElement.getElementsByClassName("emailf")[0].innerHTML;
  var domf          = elmnt.parentElement.parentElement.getElementsByClassName("domf")[0].innerHTML;
  var pobf          = elmnt.parentElement.parentElement.getElementsByClassName("pobf")[0].innerHTML;
  var telefonof     = elmnt.parentElement.parentElement.getElementsByClassName("telefonof")[0].innerHTML;
  var cpf           = elmnt.parentElement.parentElement.getElementsByClassName("cpf")[0].innerHTML;
  var imagen        = elmnt.parentElement.parentElement.getElementsByClassName("rutmaimg")[0].innerHTML;
sessionStorage.setItem('codigo', codigo);
sessionStorage.setItem('apellidoP',apellidoP);
sessionStorage.setItem('nombre', nombre);
sessionStorage.setItem('apellidoM',apellidoM);
sessionStorage.setItem('edad',edad);
sessionStorage.setItem('periodo',periodo);
sessionStorage.setItem('sexo',sexo);
sessionStorage.setItem('telefono',telefono);
sessionStorage.setItem('email',email);
sessionStorage.setItem('estatura',estatura);
sessionStorage.setItem('peso',peso);
sessionStorage.setItem('tipoc',tipoc);
sessionStorage.setItem('calle',calle);
sessionStorage.setItem('colonia',colonia);
sessionStorage.setItem('poblacion',poblacion);
sessionStorage.setItem('municipio',municipio);
sessionStorage.setItem('estado',estado);
sessionStorage.setItem('codigopostal',codigopostal);
sessionStorage.setItem('razonf',razonf);
sessionStorage.setItem('emailf',emailf);
sessionStorage.setItem('domf',domf);
sessionStorage.setItem('pobf',pobf);
sessionStorage.setItem('telefonof',telefonof);
sessionStorage.setItem('cpf',cpf);
sessionStorage.setItem('rutmaimg', imagen)
window.location.assign("../Vista/Clientes.php");
}

function llenarFormulario(){
  $("#id").val(sessionStorage.getItem('codigo'));
  $('#nombre').val(sessionStorage.getItem('nombre'));
  $('#apellidoP').val(sessionStorage.getItem('apellidoP'));
  $('#apellidoM').val(sessionStorage.getItem('apellidoM'));
  $('#edad').val(sessionStorage.getItem('edad'));
  $('#periodo').val(sessionStorage.getItem('periodo'));
  $('#sexo').val(sessionStorage.getItem('sexo'));
  $('#telefono').val(sessionStorage.getItem('telefono'));
  $('#email').val(sessionStorage.getItem('email'));
  $('#estatura').val(sessionStorage.getItem('estatura'));
  $('#peso').val(sessionStorage.getItem('peso'));
  $('#tipoc').val(sessionStorage.getItem('tipoc'));
  $('#calle').val(sessionStorage.getItem('calle'));
  $('#colonia').val(sessionStorage.getItem('colonia'));
  $('#poblacion').val(sessionStorage.getItem('poblacion'));
  $('#municipio').val(sessionStorage.getItem('municipio'));
  $('#estado').val(sessionStorage.getItem('estado'));
  $('#codigopostal').val(sessionStorage.getItem('codigopostal'));
  $('#razonf').val(sessionStorage.getItem('razonf'));
  $('#correof').val(sessionStorage.getItem('emailf'));
  $('#domiciliof').val(sessionStorage.getItem('domf'));
  $('#telefonof').val(sessionStorage.getItem('telefonof'));
  $('#codifgopf').val(sessionStorage.getItem('cpf'));
  $("#imgUsr").attr("src","../"+sessionStorage.getItem('rutmaimg'));
  $('#rutaimg').val(sessionStorage.getItem('rutmaimg'));
  sessionStorage.clear();
}


function eliminar(elmnt){
  if(!confirm("¿Está seguro de que desea borrar el registro?")){
    return;
  }
  //document.getElementById("accion").value="eliminar";
  var id = elmnt.parentElement.parentElement.getElementsByClassName("id")[0].innerHTML;
  //codigo = sessionStorage('id', id);
  document.getElementById("id").value=id;
  var datos = new FormData();
  datos.append("id",id);
  datos.append("accion","eliminar");
  $.ajax({
    // Your server script to process the upload
    url: '../Control/Clientes.php',
    type: 'POST',

    // Form data
    data: datos,

    // Tell jQuery not to process data or worry about content-type
    // You *must* include these options!
    cache: false,
    contentType: false,
    processData: false,

    // Custom XMLHttpRequest
    xhr: function () {
      var myXhr = $.ajaxSettings.xhr();
      if (myXhr.upload) {
        // For handling the progress of the upload
        myXhr.upload.addEventListener('progress', function (e) {
          if (e.lengthComputable) {
            $('progress').attr({
              value: e.loaded,
              max: e.total,
            });
          }
        }, false);
      }
      console.log(myXhr);
      console.log(myXhr['response']);
      //document.getElementById("resultado").innerText=myXhr['response'];
      //document.getElementById("accion").value="guardar";
      return myXhr;
    },
    success:function(r){
      //document.getElementById("resultado").innerText=r;
      if(r=="Eliminado correctamente"){
        alert(r);
        window.location.reload();
      }else{
        console.log(r);
      }
      
      
      
    }
  });
}

function camposVacios(){
  let nombre = document.getElementById("nombre").value;
  let apellidoP         = document.getElementById("apellidoP").value;
  let edad = document.getElementById("edad").value;
  let periodoE = document.getElementById("periodo").value;
  let sexo = document.getElementById("sexo").value;
  let email = document.getElementById("email").value;

    if( nombre=="" ||apellidoP ==""|| edad==""||periodoE==""||sexo==""||email==""){
        return true;
    } else{
      return false;
    }
}

function verificarCampos(){
  
    if(  camposVacios()||!verficarEmail()){
        document.getElementById("guardarCliente").setAttribute("disabled","");
    } else{
      document.getElementById("guardarCliente").removeAttribute("disabled");
    }

}

function numerosPunto(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  if ((key < 48 || key > 57) && key!=8 && key!=110 && key!=190 && (key < 96 || key > 105)) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function soloNumeros(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  if ((key < 48 || key > 57)) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function soloNumerosTelefono(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser
  let telefono = document.getElementById("telefono").value;
  if(telefono.length >= 15){
    e.preventDefault();
  }
  if ((key < 48 || key > 57)&&key!=43) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function soloLetras(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser
  if (((key < 65 || key > 90) && (key < 97 || key > 122)) && key!=8 ) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function codigoPostal(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  let cp = document.getElementById("codigopostal").value;
  if(cp.length >= 5){
    e.preventDefault();
  }
  if ((key < 48 || key > 57)) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function VerfEdad(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser

  let edad = document.getElementById("edad").value;
  if(parseInt(edad) >= 120){
    e.preventDefault();
  }
  if ((key < 48 || key > 57)) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function verficarEmail(){
  let formato = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  if(!document.getElementById("email").value.match(formato)){
    //alert("La dirección de correo electrónico no es válida");
    document.getElementById("guardarCliente").setAttribute("disabled","");
		return false;
  }else{
    document.getElementById("guardarCliente").removeAttribute("disabled");
    return true;
  }
}

function alertEmail(){
  if(!verficarEmail()){
    alert("La dirección de correo electrónico no es válida");
  }
}

function verificarTelefono(){
  let formato = / ^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$ /;
  return(document.getElementById("telefono").value.match(formato));
}

function alertTelefono(){
  if(!verificarTelefono()){
    alert("El número telefónico no es válido");
  }
}

function verficarEmailRFC(){
  let formato = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  return(document.getElementById("correof").value.match(formato));
    
}

function alertEmailRFC(){
  if(!verficarEmailRFC()){
    alert("La dirección de correo electrónico no es válida");
  }
  
}

function verificarRFC(){
  let formato = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
  return(document.getElementById("rfc").value.match(formato))
}

function alertRFC(){
  if(!verificarRFC()){
    alert("El RFC proporcionado no es válido");
  }
}

function soloLetrasParentesis(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser
  if (((key < 65 || key > 90) && (key < 97 || key > 122)) && key!=8 && key!=40 && key!=41) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

