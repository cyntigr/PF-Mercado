function iniciar(){
    var elemento = document.getElementById('lienzo');
    lienzo = elemento.getContext('2d');
    var imagen = new Image();
    imagen.src ='http://elmercado.eu-west-3.elasticbeanstalk.com/img/m.png';
    imagen.onload = function(){
        lienzo.drawImage(imagen, 0, 0, 100 , 82.86);
    }
} 
window.addEventListener("load", iniciar, false);
