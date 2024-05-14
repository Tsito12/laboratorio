var estudio;

function seleccionarCliente(elmnt){
    var idCliente = elmnt.parentElement.parentElement.getElementsByClassName("id")[0].innerText;
    var nombreCliente = elmnt.parentElement.parentElement.getElementsByClassName("nombre")[0].innerText;
    var apellidoPCliente = elmnt.parentElement.parentElement.getElementsByClassName("apellidoPaterno")[0].innerText;
    var apellidoMCliente = elmnt.parentElement.parentElement.getElementsByClassName("apellidoMaterno")[0].innerText;
    $('#idcliente').val(idCliente);
    $('#nombreCliente').val(nombreCliente);
    $('#apellidoP').val(apellidoPCliente);
    $('#apellidoM').val(apellidoMCliente);
    verificarCamposPagar();

}

function seleccionarMedico(elmnt){
    var idDoctor = elmnt.parentElement.parentElement.getElementsByClassName("id")[0].innerText;
    var nombreDoctor = elmnt.parentElement.parentElement.getElementsByClassName("nombre")[0].innerText;
    var apellidoPDoctor = elmnt.parentElement.parentElement.getElementsByClassName("apellidoPaterno")[0].innerText;
    var apellidoMDoctor = elmnt.parentElement.parentElement.getElementsByClassName("apellidoMaterno")[0].innerText;
    $('#iddoctor').val(idDoctor);
    $('#nombreMedico').val(nombreDoctor+" "+apellidoPDoctor+" "+apellidoMDoctor);
    verificarCamposPagar();
}

function agregarEstudio(){
    
}

function limpiarTablaPerfil(){
    var tabla = document.getElementById("tablaRecepcion");
    var filas = tabla.getElementsByTagName("tbody")[0].getElementsByTagName("tr");
    for (i = filas.length; i > 0; i--) { 
      filas[i-1].remove();
    }
}

function buscarIdEstudios(id){
  let tabla = document.getElementById("tablaConEstudios");
  let filas = tabla.getElementsByTagName("tr");
  for(i =0; i<filas.length;i++){
    if(filas[i].getElementsByTagName("td")[0].innerText==id){
      return true;
    }
  }
  return false;
}

$(document).ready(function(){
  if(document.location.pathname=="/Laboratorio/Vista/ReciboOrden.php"){
    llenarRecibo();
  }
  if(document.location.pathname=="/Laboratorio/Vista/Recepcion.php"){
    $("#modalClientes").load("ListaClientesRecepcion.php");
    $("#modalMedicos").load("ListaDoctoresRecepcion.php");
  }

  verificarCamposPagar();
  verificarCamposFinal();
  $("input").on('change focus keypress', function(event){
    if(event.target.id!="buscar"){
      verificarCamposPagar();
      verificarCamposFinal();
    }
    
  });

  $('#agregarAlPerfil').on('click',function(){
    var table, tr, td, i, txtValue;
    var total=0;
      table = document.getElementById("tablaEstudios");
      var tablaPerfil = document.getElementById("tablaRecepcion");
      tr = table.getElementsByTagName("tr");
      limpiarTablaPerfil();
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[8];
        if (td) {
          txtValue = td.textContent || td.innerText;
          if (td.firstChild.checked) {
            let idEst = tr[i].getElementsByTagName("td")[0];
            if(buscarIdEstudios(idEst)){
              return;
            }
            total+=parseFloat(tr[i].getElementsByTagName("td")[7].innerText);
            var estudio = tr[i].cloneNode(true);
            estudio.lastElementChild.remove();
            let td = document.createElement("td");
            let button = document.createElement("a");
            button.className="btn btn-danger";
            button.innerHTML="Quitar";
            button.setAttribute("onclick", "quitarDeLaOrden(this)");
            /*
            button.addEventListener("click", function()  {
              quitarDeLaOrden(estudio);
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
    $('#total').val(total);
    $('#totalH').text("Total: "+total);
    $('#tituloModal').text('Total de la orden: $'+total);
    verificarCamposPagar();
  });
    $('#guardarOrden').on('click',function(){
      if(camposVaciosFinal()||camposVaciosPagar()){
        return;
      }
        guardarDatosOrden();
        var formData = new FormData();
        var nombrePerfil = $('#nombre').val();
        var estudios = [];
        var filas = document.getElementById("tablaRecepcion").getElementsByTagName("tbody")[0].getElementsByTagName("tr");
        for(i = 0; i<filas.length;i++){
          estudios.push(filas[i].getElementsByTagName("td")[0].innerHTML);
        }
        formData.append("accion", "guardarPerfil");
        formData.append("nombre", nombrePerfil);
        formData.append("ids", estudios);
        var fecha = $('#fecha').val();
        var diagnostico = $('#diagnostico').val();
        var iddoctor = $('#iddoctor').val();
        var idempleado = $('#idempleado').val();
        var observaciones = $('#observaciones').val();
        var pago = $('#pago').val();
        var meotodPago = $('#metodopago').val();
        var idcliente = $('#idcliente').val();
        var total = $('#total').val();
        var datos = {
            accion : "guardarOrden",
            fecha: fecha,
            diagnostico : diagnostico,
            iddoctor : iddoctor,
            idempleado : idempleado,
            observaciones : observaciones,
            pago : pago,
            metodopago : meotodPago,
            idcliente : idcliente,
            total : total,
            ids : estudios
      
        };
        $.post("../Control/Recepcion.php",
              datos,
              function(data,status){
                  if(status=="success"){
                      console.log(data);
                      
                      //document.getElementById("error").innerText=data;
                      if(data===""||data==null||data==" "||data=="    "){
                          alert(data);
                          
                          //printJS('jala', 'html');
                      }
                      window.open('http://localhost/Laboratorio/Vista/ReciboOrden.php', '_blank'); 
                  }
              });
    });

    $("#idestudio").keydown(function(){
      var e = event || window.event;  // get event object
      var key = e.keyCode || e.which; // get key cross-browser
      if(key==13){
          console.log(key);
          var ide = document.getElementById("idestudio").value;
          const action = "buscarEstudio";
          $.post("../Control/Recepcion.php",
          {
              ide:ide,
              accion:action
          },
          function(data,status){
              if(status=="success"){
                  estudio = data.split(",");
                  document.getElementById("nombreestudio").value=estudio[1];
                  document.getElementById("tipo").value=estudio[2];
                  document.getElementById("contenedor").value=estudio[4];
              }
          });
      }
  });
    
});

function guardarDatosOrden(){
  //let fecha = $('#fecha').val();
  const d = new Date();
  let text = d.toLocaleString();
  let idCliente = $('#idcliente').val();
  let idEmpleado = $('#idempleado').val();
  let iddoctor = $('#iddoctor').val();
  let nombreCliente = $('#nombreCliente').val()+" "+$('#apellidoP').val()+" "+$('#apellidoM').val();
  let nombreDoctor = $('#nombreMedico').val();
  let diagnostico = $('#diagnostico').val();;
  let observaciones = $('#observaciones').val();;
  let tablaEstudios = document.getElementById("tablaEstudios").cloneNode();
  let total = $("#total").val();
  let pago = $('#pago').val();
  let restante = parseFloat(total)-parseFloat(pago);

  sessionStorage.setItem('idcliente',idCliente);
  sessionStorage.setItem('nombreCliente',nombreCliente);
  sessionStorage.setItem('iddoctor',iddoctor);
  sessionStorage.setItem('nombredoctor',nombreDoctor);
  sessionStorage.setItem('idempleado',idEmpleado);
  sessionStorage.setItem('diagnostico',diagnostico);
  sessionStorage.setItem('observaciones',observaciones);
  sessionStorage.setItem('tabla',tablaEstudios);
  sessionStorage.setItem('fecha',text);
  sessionStorage.setItem('total',total);
  sessionStorage.setItem('pago',pago);
  sessionStorage.setItem('restante',restante);
  
}

function llenarRecibo(){
  $('#nombreCliente').val(sessionStorage.getItem('nombreCliente'));
  $('#nombreDoctor').val(sessionStorage.getItem('nombredoctor'));
  $('#diagnostico').val(sessionStorage.getItem('diagnostico'));
  $('#observaciones').val(sessionStorage.getItem('observaciones'));
  $('#tablaEstudios').val(sessionStorage.getItem('tabla'));
  $('#tablaEstudios').val(sessionStorage.getItem('tabla'));
}

function agregarDeId(){
  var fila = document.createElement('tr');
  var id = document.createElement('td');
  id.innerHTML=estudio[0];
  if(buscarIdEstudios(estudio[0])){
    return;
  }
  var nombreEstudio = document.createElement('td');
  nombreEstudio.innerHTML=estudio[1];
  var tipo = document.createElement('td');
  tipo.innerHTML=estudio[2];
  var grupo = document.createElement('td');
  grupo.innerHTML=estudio[3];
  var contenedor = document.createElement('td');
  contenedor.innerHTML=estudio[4];
  var muestra = document.createElement('td');
  muestra.innerHTML=estudio[5];
  var tiempo = document.createElement('td');
  tiempo.innerHTML=estudio[6];
  var precio = document.createElement('td');
  precio.innerHTML=estudio[7];
  fila.appendChild(id);
  fila.appendChild(nombreEstudio);
  fila.appendChild(tipo);
  fila.appendChild(grupo);
  fila.appendChild(contenedor);
  fila.appendChild(muestra);
  fila.appendChild(tiempo);
  fila.appendChild(precio);
  //Boton  de quitar
  let td = document.createElement("td");
  let button = document.createElement("a");
  button.className="btn btn-danger";
  button.innerHTML="Quitar";
  button.setAttribute("onclick", "quitarDeLaOrden(this)");
  /*
  button.addEventListener("click", function()  {
    quitarDeLaOrden(estudio);
  });
  */
  td.appendChild(button);
  fila.appendChild(td);
  document.getElementById("tablaConEstudios").appendChild(fila);
  let idestudio = estudio[0];
  seleccionarEnModal(idestudio);
  actualizarTotal();
  verificarCamposPagar();
}

function seleccionarEnModal(idbuscar){
  let table = document.getElementById("tablaEstudios");
  let trs = table.getElementsByTagName("tr");
  for(i = 0; i < trs.length; i++){
    let textoid = trs[i].getElementsByTagName("td")[0].innerText;
    if(textoid==idbuscar){
      trs[i].getElementsByTagName("td")[8].firstChild.checked=true;
    }
  }

}
function quitarDeLaOrden(estudio){
  estudio.parentElement.parentElement.remove();
  actualizarTotal();
}

function actualizarTotal(){
  var filas = document.getElementById("tablaConEstudios").getElementsByTagName('tr');
  var total=0;
  for(i = 0;i<filas.length;i++){
    total+=parseFloat(filas[i].getElementsByTagName('td')[7].innerText);
  }
  $('#totalH').text('Total: '+total);
  $('#total').val(total);
  $('#tituloModal').text('Total de la orden: $'+total);
}

function buscarTablaEstudios(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscarEstudios");
  filter = input.value.toUpperCase();
  table = document.getElementById("tablaEstudios");
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

function buscarTablaDoctores(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscarDoctores");
  filter = input.value.toUpperCase();
  table = document.getElementById("tablaDoctores");
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

function buscarTablaClientes(){
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("buscarClientes");
  filter = input.value.toUpperCase();
  table = document.getElementById("tablaClientes");
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
function ocultarCambio(){
  var fila = document.getElementById("filaEfectivo");
  var claseFila = fila.className;
  if(document.getElementById("metodopago").value=="tarjeta"){
    
    fila.className=claseFila+" d-none";
  } else if(claseFila.indexOf("d-none")!=-1){
    fila.className=claseFila.replace("d-none");
  }
}

function darCambio(){
  var pagado =  parseFloat($('#pago').val());
  var recibido = parseFloat($('#recibido').val());
  if(recibido>=pagado){
    $('#cambio').val(recibido-pagado);
  }else{
    $('#cambio').val("");
  }
  
}

function camposVaciosPagar(){
  let idcliente = document.getElementById("idcliente").value;
  let idempleado         = document.getElementById("idempleado").value;
  let fecha = document.getElementById("fecha").value;
  let iddoctor = document.getElementById("iddoctor").value;
  let tablaVacia = document.getElementById("tablaConEstudios").getElementsByTagName("tr").length==0;

    if( idcliente=="" ||idempleado ==""|| fecha==""||iddoctor==""||tablaVacia){
        return true;
    } else{
      return false;
    }
}

function verificarCamposPagar(){
  
    if(  camposVaciosPagar()){
        document.getElementById("btnPagar").setAttribute("disabled","");
    } else{
      document.getElementById("btnPagar").removeAttribute("disabled");
    }

}

function camposVaciosFinal(){
  let metodopago = document.getElementById("metodopago").value;
  let pago         = document.getElementById("pago").value;
  let recibido = document.getElementById("recibido").value;
  let cambio = document.getElementById("cambio").value;

    if( metodopago=="" ||pago ==""){
        return true;
    } else{
      if(metodopago=="efectivo"){
        if(recibido==""||cambio==""){
          return true;
        }else{
          return false;
        }
      }else{
        return false;
      }
      
    }
}

function verificarCamposFinal(){
  
    if(  camposVaciosFinal()){
        document.getElementById("guardarOrden").setAttribute("disabled","");
    } else{
      document.getElementById("guardarOrden").removeAttribute("disabled");
    }

}

function esperarCliente(){
  window.open('http://localhost/Laboratorio/Vista/Clientes.php', '_blank'); 
  /*while(!clienteAgregado){
  /** */
}

function cargarModalClientes(){
  $("#modalClientes").load("ListaClientesRecepcion.php");
}

function esperarMedico(){
  window.open('http://localhost/Laboratorio/Vista/Doctores.php', '_blank'); 
  /*while(!clienteAgregado){
  /** */
}

function cargarModalDoctores(){
  $("#modalClientes").load("ListaDoctoresRecepcion.php");
}


