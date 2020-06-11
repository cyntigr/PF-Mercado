function play(){
    var audio = document.getElementById('sound');
    audio.crossOrigin="anonymous";
    audio.play();
}

function pause(){
    var audio = document.getElementById('sound');
    audio.crossOrigin="anonymous";
    audio.pause();
}

function mas(){
    var audio = document.getElementById('sound');
    audio.crossOrigin="anonymous";
    audio.volume += 0.1;
}

function menos(){
    var audio = document.getElementById('sound');
    audio.crossOrigin="anonymous";
    audio.volume -= 0.1;
}

