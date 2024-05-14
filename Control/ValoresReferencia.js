var idestudio;
var nombreEstudio;
$(document).ready(function(){
  verificarCampos();

  $("input").on('change focus keypress', function(event){
    if(event.target.id!="buscar"){
      verificarCampos();
    }
    
  });
  $('#accion').val("guardar");
  $('#guardarValor').on('click', function(){
    let idEstudio = document.getElementById("idEstudio").value;
    let sexo         = document.getElementById("sexo").value;
    //let estadoInicial          = document.getElementById("estadoinicial").value;
    //let estadoFinal    = document.getElementById("estadofinal").value;
    let descripcion   = document.getElementById("descripcion").value;
    let valorInicial        = document.getElementById("valorinicial").value;
    let valorFinal        = document.getElementById("valorfinal").value;
    let unidad        = document.getElementById("unidad").value;
    let alturaInicial        = document.getElementById("alturainicial").value;
    let alturaFinal        = document.getElementById("alturafinal").value;
      if(  idEstudio =="" ||  sexo=="" ||  descripcion==""
        || valorInicial==""   ||  valorFinal==""  || unidad==""||!comprobarEdad() 
        || !comprobarValores() || !comprobarAltura()){
          alert("Algunos campos estan incorrectos, verificar");
          return;
      }
    //$('#accion').val("guardar");
    $.ajax({
      // Your server script to process the upload
      url: '../Control/ValorReferencia.php',
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
          $('#idEstudio').val(idestudio);
          $('#nombre').val(nombreEstudio);
          document.getElementById("accion").value="guardar";
          alert(r);
          if (typeof idestudio !== 'undefined'){
            $('#tablaValores').load('ListaValorReferencia.php?idestudio='+idestudio);
          }
        }else{
          console.log(r);
        }
        //document.getElementById("resultado").innerText=r;
        
        //window.location.reload();
      }
    });
  });
});

function seleccionarEstudio(fila){
    idestudio = fila.parentElement.parentElement.children[0].innerHTML;
    nombreEstudio = fila.parentElement.parentElement.children[1].innerHTML;
    $('#idEstudio').val(idestudio);
    $('#nombre').val(nombreEstudio);

    $('#tablaValores').load('ListaValorReferencia.php?idestudio='+idestudio);
  }

  function editar(elmnt){
    $('#accion').val("editar");
    let idVr = elmnt.parentElement.parentElement.getElementsByClassName("id")[0].innerHTML;
    let sexo = elmnt.parentElement.parentElement.getElementsByClassName("sexo")[0].innerHTML;
    //let estadoInicial = elmnt.parentElement.parentElement.getElementsByClassName("estadoinicial")[0].innerHTML;
    //let estadoFinal = elmnt.parentElement.parentElement.getElementsByClassName("estadofinal")[0].innerHTML;
    let descripcion = elmnt.parentElement.parentElement.getElementsByClassName("descripcion")[0].innerHTML;
    let valorInicial = elmnt.parentElement.parentElement.getElementsByClassName("valorinicial")[0].innerHTML;
    let valorFinal = elmnt.parentElement.parentElement.getElementsByClassName("valorfinal")[0].innerHTML;
    let unidad = elmnt.parentElement.parentElement.getElementsByClassName("unidad")[0].innerHTML;
    let alturaInicial = elmnt.parentElement.parentElement.getElementsByClassName("alturainicial")[0].innerHTML;
    let alturafinal = elmnt.parentElement.parentElement.getElementsByClassName("alturafinal")[0].innerHTML;
    let nota = elmnt.parentElement.parentElement.getElementsByClassName("nota")[0].innerHTML;
    let edadInicial = elmnt.parentElement.parentElement.getElementsByClassName("edadinicial")[0].innerHTML;
    let periodoInicial = elmnt.parentElement.parentElement.getElementsByClassName("periodoinicial")[0].innerHTML;
    let edadFinal = elmnt.parentElement.parentElement.getElementsByClassName("edadfinal")[0].innerHTML;
    let periodoFinal=elmnt.parentElement.parentElement.getElementsByClassName("periodofinal")[0].innerHTML;  



    $('#idValor').val(idVr);
    $('#sexo').val(sexo);
    //$('#estadoinicial').val(estadoInicial);
    //$('#estadofinal').val(estadoFinal);
    $('#edadinicial').val(edadInicial);
    $('#periodoinicial').val(periodoInicial);
    $('#edadfinal').val(edadFinal);
    $('#periodofinal').val(periodoFinal);
    $('#descripcion').val(descripcion);
    $('#valorinicial').val(valorInicial);
    $('#valorfinal').val(valorFinal);
    $('#unidad').val(unidad);
    $('#alturainicial').val(alturaInicial);
    $('#alturafinal').val(alturafinal);
    $('#nota').val(nota);

  }

  function eliminar(elmnt){
    if(!confirm("¿Está seguro de que desea borrar el registro?")){
      return;
    }
    $('#accion').val("eliminar");
    let idVr = elmnt.parentElement.parentElement.getElementsByClassName("id")[0].innerHTML;
    $('#idValor').val(idVr);
    $.ajax({
      // Your server script to process the upload
      url: '../Control/ValorReferencia.php',
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
        if(r=="El registró se eliminó correctamente"){
          $('form')[0].reset();
          $('#idEstudio').val(idestudio);
          $('#nombre').val(nombreEstudio);
          document.getElementById("accion").value="guardar";
          alert(r);
        }else{
          console.log(r);
        }
        if (typeof idestudio !== 'undefined'){
          $('#tablaValores').load('ListaValorReferencia.php?idestudio='+idestudio);
        }
        //document.getElementById("resultado").innerText=r;
        
        //window.location.reload();
      }
    });
  }

  function buscarTabla(){
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("buscar");
    filter = input.value.toUpperCase();
    table = document.getElementById("tabla");
    tr = table.getElementsByTagName("tr");
  
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
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

  function verificarCampos(){
    let idEstudio = document.getElementById("idEstudio").value;
    let sexo         = document.getElementById("sexo").value;
    //let estadoInicial          = document.getElementById("estadoinicial").value;
    //let estadoFinal    = document.getElementById("estadofinal").value;
    let descripcion   = document.getElementById("descripcion").value;
    let valorInicial        = document.getElementById("valorinicial").value;
    let valorFinal        = document.getElementById("valorfinal").value;
    let unidad        = document.getElementById("unidad").value;
    //let alturaInicial        = document.getElementById("alturainicial").value;
    //let alturaFinal        = document.getElementById("alturafinal").value;
    let edadInicial = document.getElementById("edadinicial").value;
    let periodoInicial = document.getElementById("periodoinicial").value;
    let edadFinal = document.getElementById("edadfinal").value;
    let periodoFinal=document.getElementById("periodofinal").value;

      if(  idEstudio =="" ||  sexo=="" ||  descripcion=="" || edadInicial=="" || edadFinal==""
        || valorInicial==""   ||  valorFinal==""  || unidad=="" || !comprobarEdad() 
        || !comprobarValores() || !comprobarAltura()){
          document.getElementById("guardarValor").setAttribute("disabled","");
      } else{
        document.getElementById("guardarValor").removeAttribute("disabled");
      }
  
  }

  function numerosPunto(){
    var e = event || window.event;  // get event object
    var key = e.keyCode || e.which; // get key cross-browser
    if ((key < 48 || key > 57) && key!=8  && key!=46 ) { //if it is not a number ascii code
      //Prevent default action, which is inserting character
      if (e.preventDefault) e.preventDefault(); //normal browsers
      e.returnValue = false; //IE
    }
  }

  function soloNumeros(){
    var e = event || window.event;  // get event object
    var key = e.keyCode || e.which; // get key cross-browser
    if ((key < 48 || key > 57) && key!=8 ) { //if it is not a number ascii code
      //Prevent default action, which is inserting character
      if (e.preventDefault) e.preventDefault(); //normal browsers
      e.returnValue = false; //IE
    }
  }

  function comprobarEdad(){
    let edadInicial = document.getElementById("edadinicial").value;
    let periodoInicial = document.getElementById("periodoinicial").value;
    let edadFinal = document.getElementById("edadfinal").value;
    let periodoFinal=document.getElementById("periodofinal").value;
    let edadInicialDias=0;
    let edadFinalDias=0;
    if(periodoInicial=="years"){
      edadInicialDias = parseInt(edadInicial)*365;
    }else if(periodoInicial=="months"){
      edadInicialDias = parseInt(edadInicial)*30;
    }else if(periodoInicial=="days"){
      edadInicialDias = parseInt(edadInicial);
    }

    if(periodoFinal=="years"){
      edadFinalDias = parseInt(edadFinal)*365;
    }else if(periodoFinal=="months"){
      edadFinalDias = parseInt(edadFinal)*30;
    }else if(periodoFinal=="days"){
      edadFinalDias = parseInt(edadFinal);
    }

    return edadInicialDias<edadFinalDias;
  }

  function alertEdad(){
    let edadInicial = document.getElementById("edadinicial").value;
    let edadFinal = document.getElementById("edadfinal").value;
    if(edadInicial!=""&&edadFinal!=""){
      if(!comprobarEdad()){
        alert("La edad inicial debe ser menor a la edad final");
      }
    }
    
  }

  function comprobarValores(){
    let valorInicial = parseFloat(document.getElementById("valorinicial").value);
    let valorFinal = parseFloat(document.getElementById("valorfinal").value);
    if(!isNaN(valorInicial)&&!isNaN(valorFinal)){
      return valorInicial<valorFinal;
    }
    else return true;
  }

  function alertValores(){
    if(!comprobarValores()){
      alert("El valor inicial debe ser menor al valor final");
    }
  }

  function comprobarAltura(){
    let alturaInicial = parseFloat(document.getElementById("alturainicial").value);
    let alturaFinal = parseFloat(document.getElementById("alturafinal").value);

    if(!isNaN(alturaInicial)&&!isNaN(alturaFinal)){
      return alturaInicial<alturaFinal;
    }else return true;
  }

  function altertAltura(){
    if(!comprobarAltura()){
      alert("La altura inicial debe ser menor a la altura final");
    }
  }

