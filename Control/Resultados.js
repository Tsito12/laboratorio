function seleccionarOrden(elmnt){
    let idorden = elmnt.parentElement.parentElement.children[0].innerHTML;
    $('#idOrden').val(idorden);
    $('#idorden').val(idorden);
    $('#idestudio').load('SelectEstudios.php?idorden='+idorden);
    $("#tablaResultados").load('ListaResultados.php?idorden='+idorden);
}

$(document).ready(function(){

    verificarCampos();

    $("input").on('change focus keypress', function(event){
      if(event.target.id!="buscar"){
        verificarCampos();
      }
      
    });
    $('#accion').val("guardar");
    $('#idestudio').on('change', function(){
        let idestudio = $('#idestudio').val();
        
        $('#valorReferencia').load('SelectVR.php?idestudio='+idestudio);
    });
    $('#valorReferencia').on('change',function(){
        let vrs = valores();
        const arrvr = vrs.split("/");
        $('#valorinicial').val(arrvr[0]);
        $('#valorfinal').val(arrvr[1]);
    });

    $('#imagen1').on('change', function(){
        var idorden = $('#idorden').val();
        var idestudio = $('#idestudio').val();
        var accion = $('#accion').val();
        $('#accion').val("subirImg1");
          var imagen = document.getElementById("imagen1").value;
          console.log(imagen);
          //var datos = new FormData();
          //datos.append("imagen",imagen);
          $.ajax({
              // Your server script to process the upload
              url: '../Control/Resultados.php',
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
                if(r=="Hubo un problema al subir la imagen."||r=="El archivo no es una imagen."){
                  alert(r);
                  document.getElementById("imagen1").value="";
                  return;
                  //document.getElementById("accion").value="guardar";
                }
                let nombreimg = imagen.replace("C:\\fakepath\\","");
                document.getElementById("imgUsr1").src="../Uploads/Results/"+idorden+"&"+idestudio+"&"+nombreimg;
                $('#rutaimg1').val("Uploads/Results/"+idorden+"&"+idestudio+"&"+nombreimg);
                //
                //window.location.reload();
              }
            });
      });


      $('#imagen2').on('change', function(){
        var idorden = $('#idorden').val();
        var idestudio = $('#idestudio').val();
        var accion = $('#accion').val();
        $('#accion').val("subirImg2");
          var imagen = document.getElementById("imagen2").value;
          console.log(imagen);
          //var datos = new FormData();
          //datos.append("imagen",imagen);
          $.ajax({
              // Your server script to process the upload
              url: '../Control/Resultados.php',
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
                if(r=="Hubo un problema al subir la imagen."||r=="El archivo no es una imagen."){
                  alert(r);
                  document.getElementById("imagen2").value="";
                  return;
                  //document.getElementById("accion").value="guardar";
                }
                //document.getElementById("resultado").innerText=r;
                
                let nombreimg = imagen.replace("C:\\fakepath\\","");
                document.getElementById("imgUsr2").src="../Uploads/Results/"+idorden+"&"+idestudio+"&"+nombreimg;
                $('#rutaimg2').val("Uploads/Results/"+idorden+"&"+idestudio+"&"+nombreimg);
                //
                //window.location.reload();
              }
            });
      });

      $('#guardarResultado').on('click', function(){
          //var datos = new FormData();
          //datos.append("imagen",imagen);
          if(camposVacios()){
            alert("Favor de llenar los campos necesarios");
            return;
          }
          $.ajax({
              // Your server script to process the upload
              url: '../Control/Resultados.php',
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
                return myXhr;
              },
              success:function(r){
                if(r=="Datos guardados correctamente"){
                  sessionStorage.clear();
                  let idorden = $('#idorden').val();
                  $("#tablaResultados").load('ListaResultados.php?idorden='+idorden);
                  $('#accion').val("guardar");
                  $('form')[0].reset();
                  $('#idorden').val(idorden);
                  alert(r);
                  //document.getElementById("accion").value="guardar";
                }
                //document.getElementById("resultado").innerText=r;
                
                
                //window.location.reload();
              }
              
            });
            
      });
});


function editar(fila){
    let idorden = fila.parentElement.parentElement.getElementsByClassName("idorden")[0].innerHTML;
    let idestudio = fila.parentElement.parentElement.getElementsByClassName("idestudio")[0].innerHTML;
    let parametro = fila.parentElement.parentElement.getElementsByClassName("parametro")[0].innerHTML;
    let resultado = fila.parentElement.parentElement.getElementsByClassName("resultado")[0].innerHTML;
    let unidad = fila.parentElement.parentElement.getElementsByClassName("unidad")[0].innerHTML;
    let idvalor = fila.parentElement.parentElement.getElementsByClassName("idvalor")[0].innerHTML;
    let rutaImg1 = fila.parentElement.parentElement.getElementsByClassName("img1")[0].innerHTML;
    let rutaImg2 = fila.parentElement.parentElement.getElementsByClassName("img2")[0].innerHTML;
    let idresultado = fila.parentElement.parentElement.getElementsByClassName("idresultado")[0].innerHTML;
    let nota = fila.parentElement.parentElement.getElementsByClassName("nota")[0].innerHTML;
    
    
    $('#idresultado').val(idresultado);
    $('#idOrden').val(idorden);
    $('#accion').val('editar');
    $('#idestudio').val(idestudio);
    $('#parametro').val(parametro);
    $('#resultado').val(resultado);
    $('#unidad').val(unidad);
    $('#valorReferencia').val(idvalor);
    $('#rutaimg1').val(rutaImg1);
    $('#rutaimg2').val(rutaImg2);
    $('#nota').val(nota);
}

function eliminar(fila){
  var accion = $('#accion').val();
  if(!confirm("¿Está seguro de que desea borrar el registro?")){
    return;
  }
  let idresultado = fila.parentElement.parentElement.getElementsByClassName("idresultado")[0].innerHTML;
  $('#idresultado').val(idresultado);
  $('#accion').val('eliminar');
  $.ajax({
    // Your server script to process the upload
    url: '../Control/Resultados.php',
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
      return myXhr;
    },
    success:function(r){
      if(r=="Se eliminó correctamente"){
        alert(r);
        $('#accion').val(accion);
        let idorden = $('#idorden').val();
        $("#tablaResultados").load('ListaResultados.php?idorden='+idorden);
        //document.getElementById("accion").value="guardar";
      }else{
        console.log(r);
      }
      
      
      //window.location.reload();
    }
    
  });
  

  
}

function aprobar(fila){
  var idorden = $('#idorden').val();
  var accion = $('#accion').val();
  let idresultado = fila.parentElement.parentElement.getElementsByClassName("idresultado")[0].innerHTML;
  let aprobar = fila.innerText;
  if(aprobar=="Marcar como no aprobado"){
    $('#aprobado').val('0');
  }else{
    $('#aprobado').val('1');
  }
  
  $('#idresultado').val(idresultado);
  $('#accion').val('aprobar');
  
  $.ajax({
    // Your server script to process the upload
    url: '../Control/Resultados.php',
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
      return myXhr;
    },
    success:function(r){
      if(r=="Resultado aprobado"){
        sessionStorage.clear();
        $('form')[0].reset();
        $('#idorden').val(idorden);
        //document.getElementById("accion").value="guardar";
      }
      alert(r);
      
      //window.location.reload();
    }
  });
  
  $("#tablaResultados").load('ListaResultados.php?idorden='+idorden);
  $('#accion').val(accion);
}

function valores(){
  let valor = $('#valorReferencia').val();
  var select = document.getElementById("valorReferencia");
  var options = select.getElementsByTagName("option");
  for(i = 0; i<options.length;i++){
    if(options[i].value==valor){
      console.log(options[i].className);
      return options[i].className;
    }
  }
}

function buscarTabla(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabla");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}

function camposVacios(){
  let idOrden = document.getElementById("idOrden").value;
  let idEstudio         = document.getElementById("idestudio").value;
  let idValor          = document.getElementById("valorReferencia").value;
  let parametro    = document.getElementById("parametro").value;
  let resultado   = document.getElementById("resultado").value;
  let unidad        = document.getElementById("unidad").value;

    if( idOrden=="" ||idEstudio =="" ||  idValor=="" || parametro=="" || resultado=="" ||unidad==""){
        return true;
    } else{
      return false;
    }
}

function verificarCampos(){
  
    if(  camposVacios()){
        document.getElementById("guardarResultado").setAttribute("disabled","");
    } else{
      document.getElementById("guardarResultado").removeAttribute("disabled");
    }

}