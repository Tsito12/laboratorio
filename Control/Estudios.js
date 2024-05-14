var codigo;
var nombreEstudio;
var grupo;
var tipo;
var contenedor;
var area;
var tipoMuestra;
var metodo;
var tiempo;
var precio;
var estado;
var unidad;
var observaciones;
$(document).ready(function(){
  if(typeof($('form')[0])!="undefined"){
    $('form')[0].reset();
  }
    if(document.getElementById("estadoE")!=null){
      var inputs = document.getElementsByClassName("estado");
      var estados = document.getElementsByClassName("estadoE");
      for(var i = 0; i<inputs.length; i++){
        if(estados[i].innerHTML=="0"){
          inputs[i].firstChild.checked=false;
        } else if(estados[i].innerHTML=="1"){
          inputs[i].firstChild.checked=true;
        }
      }
    }
    if(sessionStorage.getItem('codigo')!=null){
      llenarCampos();
      document.getElementById("accion").value="editar";
    } else if(document.getElementById("accion")!=null){
      document.getElementById("accion").value="guardar";
    }
    
    $('#Guardar').on('click',function()
    {
        nombreEstudio = document.getElementById("nombre");
        grupo         = document.getElementById("grupo");
        tipo          = document.getElementById("tipo");
        contenedor    = document.getElementById("contenedor");
        area          = document.getElementById("area");
        tipoMuestra   = document.getElementById("tipomuestra");
        tiempo        = document.getElementById("tiempo");
        estado        = document.getElementById("estado");
        precio        = document.getElementById("precio");
        metodo        = document.getElementById("metodo");
        if((vacio(nombreEstudio)||vacio(grupo)||vacio(tipo)||vacio(contenedor)||vacio(area)
          ||vacio(tipoMuestra)||vacio(tiempo)||vacio(estado)||vacio(precio)||vacio(metodo))){
            return;
        }
        $.ajax({
            // Your server script to process the upload
            url: '../Control/Estudios.php',
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
              if(r=="Datos Editados correctamente"||r=="Datos guardados correctamente"){
                sessionStorage.clear();
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
    }
    );
    $("input").on('change focus keypress', function(event){
      if(event.target.id!="buscar"){
        verificarCampos();
      }
      
    });

    $('#agregarAlPerfil').on('click',function(){
      var table, tr, td, i, txtValue;
      table = document.getElementById("tabla");
      var tablaPerfil = document.getElementById("estudiosP");
      tr = table.getElementsByTagName("tr");
      limpiarTablaPerfil();
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[9];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (td.firstChild.checked) {
            var estudio = tr[i].cloneNode(true);
            estudio.lastElementChild.remove();
            let td = document.createElement("td");
            let button = document.createElement("a");
            button.className="btn btn-danger";
            button.innerHTML="Quitar";
            button.setAttribute("onclick", "quitarDelPerfil(this)");
            /*
            button.addEventListener("click", function()  {
              quitarDelPerfil(estudio);
            });
            */
            td.appendChild(button)
            estudio.appendChild(td);
            tablaPerfil.getElementsByTagName("tbody")[0].appendChild(estudio);
            //tabla.getElementsByTagName("tbody")[0].appendChild(estudio);
            //estudios.push(tr);
          } 
        }
      }
    });


    $('#guardarPerfil').on('click', function(){
      var formData = new FormData();
      var nombrePerfil = $('#nombre').val();
      var estudios = [];
      var filas = document.getElementById("estudiosP").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
      for(i = 0; i<filas.length;i++){
        estudios.push(filas[i].getElementsByTagName("td")[0].innerHTML);
      }
      formData.append("accion", "guardarPerfil");
      formData.append("nombre", nombrePerfil);
      formData.append("ids", estudios);
      var datos = {
        accion : "guardarPerfil",
        nombre : nombrePerfil,
        ids : estudios
    
      };
      $.post("../Control/Estudios.php",
            datos,
            function(data,status){
                if(status=="success"){
                    console.log(data);
                    //document.getElementById("error").innerText=data;
                    if(data===""||data==null||data==" "||data=="    "){
                        alert(data);
                        //printJS('jala', 'html');
                    }
                }
            });
    });
});



function limpiarTablaPerfil(){
  var tabla = document.getElementById("estudiosP");
  var filas = tabla.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
  for (i = filas.length; i > 0; i--) { 
    filas[i-1].remove();
  }
}

function quitarDelPerfil(fila){
  fila.parentElement.parentElement.remove();
}


function vacio(elmnt){
    if(elmnt.value==""){
      document.getElementById("Guardar").setAttribute("disabled","");
      //elmnt.parentElement.getElementsByClassName("vacio")[0].innerText="Se debe llenar este campo";
      return true;
    }
    else{
      document.getElementById("Guardar").removeAttribute("disabled");
      //elmnt.parentElement.getElementsByClassName("vacio")[0].innerText="";
      return false;
    }
}

function editar(elmnt){
  //document.getElementById("accion").value="obtener";
  codigo        = elmnt.parentElement.parentElement.getElementsByClassName("codigo")[0].innerHTML;
  nombreEstudio = elmnt.parentElement.parentElement.getElementsByClassName("nombre")[0].innerHTML;
  grupo         = elmnt.parentElement.parentElement.getElementsByClassName("grupo")[0].innerHTML;
  tipo          = elmnt.parentElement.parentElement.getElementsByClassName("tipo")[0].innerHTML;
  contenedor    = elmnt.parentElement.parentElement.getElementsByClassName("contenedor")[0].innerHTML;
  area          = elmnt.parentElement.parentElement.getElementsByClassName("area")[0].innerHTML;
  tipoMuestra   = elmnt.parentElement.parentElement.getElementsByClassName("tipoMuestra")[0].innerHTML;
  metodo        = elmnt.parentElement.parentElement.getElementsByClassName("metodo")[0].innerHTML;
  tiempo        = elmnt.parentElement.parentElement.getElementsByClassName("tiempo")[0].innerHTML;
  precio        = elmnt.parentElement.parentElement.getElementsByClassName("precio")[0].innerHTML;
  estado        = elmnt.parentElement.parentElement.getElementsByClassName("estadoE")[0].innerHTML;
  unidad        = elmnt.parentElement.parentElement.getElementsByClassName("unidad")[0].innerHTML;
  observaciones = elmnt.parentElement.parentElement.getElementsByClassName("observaciones")[0].innerHTML;
  sessionStorage.setItem('codigo', codigo);
  sessionStorage.setItem('nombre', nombreEstudio);
  sessionStorage.setItem('grupo', grupo);
  sessionStorage.setItem('tipo', tipo);
  sessionStorage.setItem('contenedor', contenedor);
  sessionStorage.setItem('area', area);
  sessionStorage.setItem('tipoMuestra', tipoMuestra);
  sessionStorage.setItem('metodo', metodo);
  sessionStorage.setItem('tiempo', tiempo);
  sessionStorage.setItem('precio', precio);
  sessionStorage.setItem('estado', estado);
  sessionStorage.setItem('unidad', unidad);
  sessionStorage.setItem('observaciones', observaciones);
  //console.log(nombreEstudio);
  window.location.assign("../Vista/form.php");
  document.getElementById("accion").value="editar";
  llenarCampos();
}

function verificarCampos(){
  nombreEstudio = document.getElementById("nombre").value;
  grupo         = document.getElementById("grupo").value;
  tipo          = document.getElementById("tipo").value;
  contenedor    = document.getElementById("contenedor").value;
  tipoMuestra   = document.getElementById("tipomuestra").value;
  tiempo        = document.getElementById("tiempo").value;
  estado        = document.getElementById("estado").value;
  precio        = document.getElementById("precio").value;
  metodo        = document.getElementById("metodo").value;
    if(  nombreEstudio =="" ||  grupo=="" || tipo=="" || contenedor=="" || tipoMuestra==""
      || tiempo==""   ||  precio==""  || metodo==""){
        document.getElementById("Guardar").setAttribute("disabled","");
    } else{
      document.getElementById("Guardar").removeAttribute("disabled");
    }

}

function llenarCampos(){
  document.getElementById("id").value=sessionStorage.getItem('codigo');
  document.getElementById("nombre").value=sessionStorage.getItem('nombre');
  document.getElementById("grupo").value=sessionStorage.getItem('grupo');
  document.getElementById("tipo").value=sessionStorage.getItem('tipo');
  document.getElementById("contenedor").value=sessionStorage.getItem('contenedor');
  document.getElementById("area").value=sessionStorage.getItem('area');
  document.getElementById("tipomuestra").value=sessionStorage.getItem('tipoMuestra');
  document.getElementById("tiempo").value=sessionStorage.getItem('tiempo');
  var estado = sessionStorage.getItem('estado');
  if(estado=="1"){
    document.getElementById("estado").checked=true;
  } else if(estado=="0"){
    document.getElementById("estado").checked=false;
  }
  document.getElementById("precio").value=sessionStorage.getItem('precio');
  document.getElementById("metodo").value=sessionStorage.getItem('metodo');
  document.getElementById("unidad").value=sessionStorage.getItem("unidad");
  document.getElementById("observaciones").value=sessionStorage.getItem("observaciones");
}


function eliminar(elmnt){
  if(!confirm("¿Está seguro de que desea borrar el registro?")){
    return;
  }
  document.getElementById("accion").value="eliminar";
  var id = elmnt.parentElement.parentElement.getElementsByClassName("codigo")[0].innerHTML;
  //codigo = sessionStorage('id', id);
  document.getElementById("id").value=id;
  $.ajax({
    // Your server script to process the upload
    url: '../Control/Estudios.php',
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
      document.getElementById("resultado").innerText=myXhr['response'];
      document.getElementById("accion").value="guardar";
      return myXhr;
    },
    success:function(r){
      if(r=="Eliminado correctamente"){
        alert(r);
      }else{
        console.log(r);
      }
      //document.getElementById("resultado").innerText=r;
      //$('form')[0].reset();
      document.getElementById("accion").value="guardar";
      window.location.reload();
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

function buscarTablaPerfil(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscarPerfil");
  filter = input.value.toUpperCase();
  table = document.getElementById("tablaPerfiles");
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


function seleccionarPerfil(fila){
  $('#idPerfil').val(fila.parentElement.parentElement.children[0].innerHTML);
  $('#nombre').val(fila.parentElement.parentElement.children[1].innerHTML);

}

function seleccionarPerfilEditar(fila){
  $('#idPerfil').val(fila.parentElement.parentElement.children[0].innerHTML);
  $('#nombre').val(fila.parentElement.parentElement.children[1].innerHTML);
  
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

function soloLetras(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser
  if (((key < 65 || key > 90) && (key < 97 || key > 122)) && key!=8 && key!=32 ) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}

function soloLetrasParentesis(){
  var e = event || window.event;  // get event object
  var key = e.keyCode || e.which; // get key cross-browser
  if (((key < 65 || key > 90) && (key < 97 || key > 122)) && key!=8 && key!=40 && key!=41 && key!=32) { //if it is not a number ascii code
    //Prevent default action, which is inserting character
    if (e.preventDefault) e.preventDefault(); //normal browsers
    e.returnValue = false; //IE
  }
}