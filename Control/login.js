function acceso(){
    $.ajax({
        // Your server script to process the upload
        url: 'Control/Login.php',
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
          alert(r);
          if(r=="Acceso exitoso"){
            window.location.assign("Vista/menu.php")
          }
          //window.location.reload();
        }
      });
}