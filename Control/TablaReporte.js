$(document).ready(function(){
    if(document.location.pathname=="/Laboratorio/Vista/ListaPorPagar.php" ||
    document.location.pathname=="/Laboratorio/Vista/ListaOrdenesReporte.php"){
        document.getElementById("btnImprimir").className="d-none";
        document.getElementById("titulo").className="";
    }
    
});