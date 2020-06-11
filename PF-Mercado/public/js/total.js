function actualizarTotal(checked, valor) {

    var suma_actual = 0;
    var resultado = document.getElementById('total');
    valor = parseFloat(valor);
  
    if (resultado != null) {
        if (isNaN(resultado.value)) {
          resultado.value = 0;
        }
        suma_actual = parseFloat(resultado.value);
    }
  
    if (checked == true) {
        suma_actual = suma_actual + valor;
    } else {
        suma_actual = suma_actual - valor;
    }
    
    resultado.value = suma_actual;
}