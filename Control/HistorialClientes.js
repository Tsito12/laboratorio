function seleccionarCliente(elmnt){
    var idCliente = elmnt.parentElement.parentElement.getElementsByClassName("id")[0].innerText;
    $('#idcliente').val(idCliente);
    $('#tablaHistorial').load('ResultadosPorCliente.php?idcliente='+idCliente);
}

function resultadosOrden(elmnt){
    var idorden = elmnt.parentElement.parentElement.getElementsByClassName("codigo")[0].innerText;
    window.open('http://localhost/Laboratorio/Resultados.php?orden='+idorden, '_blank');
}