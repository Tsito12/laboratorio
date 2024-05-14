$(document).ready(function(){
  verificarCampos();
  $("input").on('change focus keypress', function(event){
    if(event.target.id!="buscar"){
      verificarCampos();
    }
    
  });
  $('#accion').val("guardar");
  if(sessionStorage.getItem("codigo")!=null){
    llenarCampos();
    $('#accion').val("editar");
    sessionStorage.clear();
  }

  
    $('#guardarDoctor').on('click',function(){
        if(camposVacios()){
          alert("Favor de llenar los campos requeridos");
          return;
        }
        if(document.getElementById("email").value!=""){
          alertEmail();
          if(!verficarEmail()){
            return;
          }
          
        }
        if(document.getElementById("telefono").value!=""){
          alertTelefono();
          if(!verificarTelefono()){
            return;
          }
          
        }
        if(document.getElementById("rfc").value!=""){
          alertRFC();
          if(!verificarRFC()){
            return;
          }
          
        }
        $.ajax({
            // Your server script to process the upload
            url: '../Control/Doctores.php',
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
              if(r=="Datos guardados correctamente"||r=="Datos editados correctamente"){
                $('form')[0].reset();
                document.getElementById("accion").value="guardar";
                alert(r);
              }else{
                console.log(r);
              }
              //document.getElementById("resultado").innerText=r;
              
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
  var telefono      = elmnt.parentElement.parentElement.getElementsByClassName("telefono")[0].innerHTML;
  var email         = elmnt.parentElement.parentElement.getElementsByClassName("email")[0].innerHTML;
  var calle         = elmnt.parentElement.parentElement.getElementsByClassName("calle")[0].innerHTML;
  var colonia       = elmnt.parentElement.parentElement.getElementsByClassName("colonia")[0].innerHTML;
  var poblacion     = elmnt.parentElement.parentElement.getElementsByClassName("poblacion")[0].innerHTML;
  var municipio     = elmnt.parentElement.parentElement.getElementsByClassName("municipio")[0].innerHTML;
  var estado        = elmnt.parentElement.parentElement.getElementsByClassName("estado")[0].innerHTML;
  var codigopostal  = elmnt.parentElement.parentElement.getElementsByClassName("codigopostal")[0].innerHTML;
  var razonf        = elmnt.parentElement.parentElement.getElementsByClassName("razonf")[0].innerHTML;
  var convenio      = elmnt.parentElement.parentElement.getElementsByClassName("convenio")[0].innerHTML;
  var fechaconvenio = elmnt.parentElement.parentElement.getElementsByClassName("fechaconvenio")[0].innerHTML;
  var rfc           = elmnt.parentElement.parentElement.getElementsByClassName("rfc")[0].innerHTML;
  sessionStorage.setItem('codigo', codigo);
  sessionStorage.setItem('apellidoP',apellidoP);
  sessionStorage.setItem('nombre', nombre);
  sessionStorage.setItem('apellidoM',apellidoM);
  sessionStorage.setItem('telefono',telefono);
  sessionStorage.setItem('email',email);
  sessionStorage.setItem('calle',calle);
  sessionStorage.setItem('colonia',colonia);
  sessionStorage.setItem('poblacion',poblacion);
  sessionStorage.setItem('municipio',municipio);
  sessionStorage.setItem('estado',estado);
  sessionStorage.setItem('codigopostal',codigopostal);
  sessionStorage.setItem('razonf',razonf);
  sessionStorage.setItem('rfc',rfc);
  sessionStorage.setItem('convenio',convenio);
  sessionStorage.setItem('fechaconvenio',fechaconvenio);

  window.location.assign("../Vista/Doctores.php");
}

function llenarCampos(){
  $("#id").val(sessionStorage.getItem('codigo'));
  $('#nombre').val(sessionStorage.getItem('nombre'));
  $('#apellidoP').val(sessionStorage.getItem('apellidoP'));
  $('#apellidoM').val(sessionStorage.getItem('apellidoM'));
  $('#telefono').val(sessionStorage.getItem('telefono'));
  $('#email').val(sessionStorage.getItem('email'));
  $('#calle').val(sessionStorage.getItem('calle'));
  $('#colonia').val(sessionStorage.getItem('colonia'));
  $('#poblacion').val(sessionStorage.getItem('poblacion'));
  $('#municipio').val(sessionStorage.getItem('municipio'));
  $('#estado').val(sessionStorage.getItem('estado'));
  $('#codigopostal').val(sessionStorage.getItem('codigopostal'));
  $('#razonf').val(sessionStorage.getItem('razonf'));
  $('#rfc').val(sessionStorage.getItem('rfc'));
  $('#convenio').val(sessionStorage.getItem('convenio'));
  $('#fechaconvenio').val(sessionStorage.getItem('fechaconvenio'));
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
    url: '../Control/Doctores.php',
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
      if(r=="El registró se eliminó correctamente"){
        alert(r);
      }else{
        console.log(r);
      }
      
      //$('form')[0].reset();
      //document.getElementById("accion").value="guardar";
      window.location.reload();
    }
  });
}

function camposVacios(){
  let nombre = document.getElementById("nombre").value;
  let apellidoP         = document.getElementById("apellidoP").value;

    if( nombre=="" ||apellidoP ==""){
        return true;
    } else{
      return false;
    }
}

function verificarCampos(){
  
    if(  camposVacios()){
        document.getElementById("guardarDoctor").setAttribute("disabled","");
    } else{
      document.getElementById("guardarDoctor").removeAttribute("disabled");
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

function verficarEmail(){
  let formato = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
  if(!document.getElementById("email").value.match(formato)){
    //alert("La dirección de correo electrónico no es válida");
    document.getElementById("guardarDoctor").setAttribute("disabled","");
		return false;
  }else{
    document.getElementById("guardarDoctor").removeAttribute("disabled");
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

function verificarRFC(){
  let formato = /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/;
  return(document.getElementById("rfc").value.match(formato))
}

function alertRFC(){
  if(!verificarRFC()){
    alert("El RFC proporcionado no es válido");
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