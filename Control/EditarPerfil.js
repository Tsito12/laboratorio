$(document).ready(function(){
  $('#agregarAlPerfil').on('click',function(){
    var table, tr, td, i, txtValue;
    table = document.getElementById("tabla");
    var tablaPerfil = document.getElementById("tablaPerfil");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[9];
      let idEst = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (td.firstChild.checked&&!pruebaDuplicada(idEst.innerText)) {
          var estudio = tr[i].cloneNode(true);
          estudio.lastElementChild.remove();
          let td = document.createElement("td");
          let button = document.createElement("a");
          button.className="btn btn-danger";
          button.innerHTML="Quitar";
          button.addEventListener("click", function()  {
            quitarDelPerfil(estudio);
          });
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
    var nombrePerfil = $('#nombre').val();
    var idPerfil = $('#idPerfil').val();
    var estudios = [];
    var filas = document.getElementById("tablaPerfil").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
    for(i = 0; i<filas.length;i++){
      estudios.push(filas[i].getElementsByTagName("td")[0].innerHTML);
    }
    var datos = {
      accion : "EditarPerfil",
      idP : idPerfil,
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

function seleccionarPerfil(fila){
  let id = fila.parentElement.parentElement.children[0].innerHTML;
    $('#idPerfil').val(fila.parentElement.parentElement.children[0].innerHTML);
    $('#nombre').val(fila.parentElement.parentElement.children[1].innerHTML);
    //limpiarTablaPerfil();
    $('#tablaPerfil').load('ListaEstudiosEnPerfil.php?id='+id);
  }

function quitarDelPerfil(fila){
  fila.remove();
}

function EliminarDelPerfil(elemento){
  elemento.parentElement.parentElement.remove();
}

function pruebaDuplicada(idEst){
  let tablaEstudios = $('#tablaPerfil').find("table").find("tbody"); 
  let tr = tablaEstudios.find("tr");
  for (i = 0; i < tr.length; i++) {
    let td = tr[i].getElementsByTagName("td")[0];
    if(td.innerText==idEst){
      return true;
    }
  }
  return false;
}

function limpiarTablaPerfil(){
  var tabla = document.getElementById("tablaPerfil");
  var filas = tabla.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
  for (i = filas.length; i > 0; i--) { 
    filas[i-1].remove();
  }
}

function buscarTablaPerfil(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscarPerfil");
  filter = input.value.toUpperCase();
  table = document.getElementById("tcuerpoPerfil");
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