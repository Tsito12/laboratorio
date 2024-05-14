$(document).ready(function(){
  if(document.getElementById("nombre").value==""){
    document.getElementById("Guardar").setAttribute("disabled","");
  }else{
    document.getElementById("Guardar").removeAttribute("disabled");
  }

  $("#nombre").on('keyup',function(){
    if(document.getElementById("nombre").value==""){
      document.getElementById("Guardar").setAttribute("disabled","");
    }else{
      document.getElementById("Guardar").removeAttribute("disabled");
    }
  });
    $('#tablaArea').load('ListaContenedores.php');
    document.getElementById("accion").value="guardar";
    $('#Guardar').on('click', function(){
        $.ajax({
            // Your server script to process the upload
            url: '../Control/Contenedor.php',
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
              document.getElementById("accion").value="guardar";
              return myXhr;
            },
            success:function(r){
              if(r=="Datos guardados correctamente"||r=="Datos Editados correctamente"){
                $('form')[0].reset();
                $('#tablaArea').load('ListaContenedores.php');
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

function editar(fila){
    let id = fila.parentElement.parentElement.getElementsByClassName("id")[0].innerHTML;
    let nombre = fila.parentElement.parentElement.getElementsByClassName("nombre")[0].innerHTML;
    $('#accion').val('editar');
    $('#id').val(id);
    $('#nombre').val(nombre);
    $('#prioridad').val(prioridad);
}

function eliminar(fila){
    let id = fila.parentElement.parentElement.getElementsByClassName("id")[0].innerHTML;
    $('#accion').val('eliminar');
    $('#id').val(id);
    if(!confirm("¿Está seguro de que desea borrar el registro?")){
        return;
    }
    $.ajax({
        // Your server script to process the upload
        url: '../Control/Contenedor.php',
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
          document.getElementById("accion").value="guardar";
          return myXhr;
        },
        success:function(r){
          if(r=="Eliminado correctamente"){
            $('form')[0].reset();
            $('#tablaArea').load('ListaContenedores.php');
            document.getElementById("accion").value="guardar";
            alert(r);
          }else{
            console.log(r);
          }
          //document.getElementById("resultado").innerText=r;
          
          //window.location.reload();
        }
      });
}