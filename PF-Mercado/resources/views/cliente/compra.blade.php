@extends('navbar')

@section('content')
<div class="container py-4">
    <div class="row producto">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img class="card-img" src="{{ asset('storage/'.$producto->foto) }}" alt="{{ $producto->nombre }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title">{{ $producto->nombre }}</h1>
                        <p class="card-text">{{ $producto->descripcion }}</p>
                        <p class="card-text">Precio: {{ $producto->precio }} €/kg</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection