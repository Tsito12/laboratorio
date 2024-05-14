$(document).ready(function(){
    $('#accion').val("guardar");
    if(sessionStorage.getItem("codigo")!=null){
      llenarCampos();
      $('#accion').val("editar");
      sessionStorage.clear();
    }
    verificarCampos();
  $("input").on('change focus keypress', function(event){
    if(event.target.id!="buscar"){
      verificarCampos();
    }
    
  });
    
      $('#guardarEmpleado').on('click',function(){
          if(camposVacios()||!verificarTelefono()||!verificarRFC()||!verficarUser()||!verficarPass()){
            alert("Algunos campos no estan correctos, favor de revisar");
            return;
          }
          $.ajax({
              // Your server script to process the upload
              url: '../Control/Empleados.php',
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
                  alert(r);
                  document.getElementById("accion").value="guardar";
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
    var rfc           = elmnt.parentElement.parentElement.getElementsByClassName("rfc")[0].innerHTML;
    var puesto        = elmnt.parentElement.parentElement.getElementsByClassName("puesto")[0].innerHTML;
    var usuario       = elmnt.parentElement.parentElement.getElementsByClassName("cuenta")[0].innerHTML;
    var password      = elmnt.parentElement.parentElement.getElementsByClassName("password")[0].innerHTML;
    sessionStorage.setItem('codigo', codigo);
    sessionStorage.setItem('apellidoP',apellidoP);
    sessionStorage.setItem('nombre', nombre);
    sessionStorage.setItem('apellidoM',apellidoM);
    sessionStorage.setItem('telefono',telefono);
    sessionStorage.setItem('rfc',rfc);
    sessionStorage.setItem('puesto',puesto);
    sessionStorage.setItem('cuenta',usuario);
    sessionStorage.setItem('password',password);
  
    window.location.assign("../Vista/Empleados.php");
  }
  
  function llenarCampos(){
    $("#id").val(sessionStorage.getItem('codigo'));
    $('#nombre').val(sessionStorage.getItem('nombre'));
    $('#apellidoP').val(sessionStorage.getItem('apellidoP'));
    $('#apellidoM').val(sessionStorage.getItem('apellidoM'));
    $('#telefono').val(sessionStorage.getItem('telefono'));
    $('#rfc').val(sessionStorage.getItem('rfc'));
    $('#puesto').val(sessionStorage.getItem('puesto'));
    $('#usuario').val(sessionStorage.getItem('cuenta'));
    $('#password').val(sessionStorage.getItem('password'));
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
      url: '../Control/Empleados.php',
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
    let telefono = document.getElementById("telefono").value;
    let rfc = document.getElementById("rfc").value;
    let puesto = document.getElementById("puesto").value;
    let usuario = document.getElementById("usuario").value;
    let password = document.getElementById("password").value;
  
      if( nombre=="" ||apellidoP ==""|| telefono==""||rfc==""||puesto==""||usuario==""||password==""){
          return true;
      } else{
        return false;
      }
  }
  
  function verificarCampos(){
    
      if(  camposVacios()){
          document.getElementById("guardarEmpleado").setAttribute("disabled","");
      } else{
        document.getElementById("guardarEmpleado").removeAttribute("disabled");
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

  function verficarUser(){
    let user = document.getElementById("usuario").value;
    return user.length>=6;
  }

  function alertUser(){
    if(!verficarUser()){
      alert("El nombre de usuario debe tener al menos 6 caracteres");
    }
  }

  function verficarPass(){
    let user = document.getElementById("password").value;
    return user.length>=8;
  }

  function alertPass(){
    if(!verficarPass()){
      alert("La contraseña debe tener al menos 8 caracteres");
    }
  }

