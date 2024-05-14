function liquidar(fila){

    let idorden = fila.parentElement.parentElement.getElementsByClassName("idorden")[0].innerHTML;
    let faltante = fila.parentElement.parentElement.getElementsByClassName("faltante")[0].innerHTML;
    $('#idorden').val(idorden);
    $('#faltante').val(faltante);
    $('#accion').val('liquidar');
    if(!confirm("¿Liquidar por un total de "+faltante+"?")){
        return;
    }
    $.ajax({
        // Your server script to process the upload
        url: '../Control/Recepcion.php',
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
          if(r=="Orden liquidada con éxito"){
            sessionStorage.clear();
            $('form')[0].reset();
            //document.getElementById("accion").value="guardar";
          }
          alert(r);
          
          //window.location.reload();
        }
        
      });

}