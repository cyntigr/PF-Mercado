@extends('navbar')

@section('head')
<script src="{{ asset('js/logoCanvas.js') }}" defer></script>
<script src="{{ asset('js/audio.js') }}" defer></script>
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body text-center">
                <div class="row justify-content-center">
                    <h3>Ayuda</h3>
                    <section id="cajalienzo" class="card-img-top">
                        <canvas id="lienzo" width="100" height="83"></canvas>
                    </section>
                </div>

                <div class="row justify-content-center">
                    <h5 class="card-title pt-4">Como crear un puesto nuevo</h5>
                </div>
                <div class="row justify-content-center">
                    <video id="tutorial" preload controls style="width:70%" >
                        <source src="{{ asset('img/mercado.mp4') }}" type='video/mp4' />
                        <source src="{{ asset('img/mercado.ogg') }}" type='video/ogg' />
                        <source src="{{ asset('img/mercado.webm') }}" type='video/webm' />
                    </video>
                </div>
                <div class="row move mt-4 ">
                    <h3>Contacto Administrador</h3>
                </div>
                <div class="row move ">
                    <strong>Email: </strong>
                    <span> cyntigr@gmail.com</span>
                </div>
                <div class="row move">
                    <strong>Teléfono: </strong>
                    <span> 661121633</span>
                </div>

                <div class="row justify-content-center">
                    <h5 class="card-title pt-4">Música ambiente</h5>
                </div>

                <div class="row justify-content-center">
                    <audio id="sound" loop>
                        <source src="{{ asset('sound/Friends.mp3') }}" type="audio/mpeg"/>
                    </audio>
                    <div class="mb-4">
                        <button class="btn btn-warning mt-4"  onclick="play()">Play</button>
                        <button class="btn btn-warning mt-4"  onclick="pause()">Pause</button>
                        <button class="btn btn-warning mt-4"  onclick="mas()">+ Volumen</button>
                        <button class="btn btn-warning mt-4"  onclick="menos()">- Volumen</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
