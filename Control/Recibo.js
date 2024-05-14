$(document).ready(function(){
    llenarRecibo();
});

function llenarRecibo(){
    $('#nombreCliente').text(sessionStorage.getItem('nombreCliente'));
    $('#nombreDoctor').text(sessionStorage.getItem('nombredoctor'));
    $('#diagnostico').text(sessionStorage.getItem('diagnostico'));
    $('#observaciones').text(sessionStorage.getItem('observaciones'));
    $('#fecha').text("Fecha: "+sessionStorage.getItem("fecha"));
    //$('#tablaEstudios').text(sessionStorage.getItem('tabla'));
    $('#total').text(sessionStorage.getItem('total'));
    $('#pago').text(sessionStorage.getItem('pago'));
    $('#restante').text(sessionStorage.getItem('restante'));
    let horas = totalHoras();
    $('#msg').text("En aproximadamente "+horas+" horas escanee el siguente código QR para visualizar sus resultados");
    let idestudio = $('#idestudio').text();
    $('#alt').text("O, desde cualquier navegador, ingrese a http://LaboratorioEPO.com/Resultados.php?orden="+idestudio);
    
  }

  function totalHoras(){
    var tabla = document.getElementById("tablarecibo");
    var filas = tabla.getElementsByTagName("tr");
    var totalHoras = 0;
    for(i = 0; i<filas.length;i++){
        var columna = filas[i].getElementsByTagName("td")[5];
        txtHoras = columna.innerHTML.replace(" horas","");
        totalHoras+=parseFloat(columna.innerText);
    }
    return totalHoras;
  }

