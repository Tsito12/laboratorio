

function tablaReporte(fila){
    let boton = fila.id;
  if(boton=="select"){
    let periodo = $('#periodo').val();
    $('#tablaReporte').load('ListaPorPagar.php?periodo='+periodo);
    sessionStorage.setItem("tabla",'ListaPorPagar.php?periodo='+periodo);
  }else{
    let fechaInicio = $('#fechainicio').val();
    let fechaTermino = $('#fechatermino').val();
    $('#tablaReporte').load('ListaPorPagar.php?fechainicio='+fechaInicio+"&fechatermino="+fechaTermino);
    sessionStorage.setItem("tabla",'ListaPorPagar.php?fechainicio='+fechaInicio+"&fechatermino="+fechaTermino);
  }
}

function tablaReporteT(fila){
    let boton = fila.id;
  if(boton=="selectT"){
    let periodo = $('#periodoT').val();
    $('#tablaReporte').load('ListaOrdenesReporte.php?periodo='+periodo);
    sessionStorage.setItem("tabla",'ListaOrdenesReporte.php?periodo='+periodo);
  }else{
    let fechaInicio = $('#fechainicioT').val();
    let fechaTermino = $('#fechaterminoT').val();
    $('#tablaReporte').load('ListaOrdenesReporte.php?fechainicio='+fechaInicio+"&fechatermino="+fechaTermino);
    sessionStorage.setItem("tabla",'ListaOrdenesReporte.php?fechainicio='+fechaInicio+"&fechatermino="+fechaTermino);
  }
}
