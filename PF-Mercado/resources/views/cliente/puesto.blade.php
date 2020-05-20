@extends('navbar')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img class="card-img" src="{{ asset('storage/'.$puesto->foto) }}" alt="{{ $puesto->nombre }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h3 class="card-title">{{ $puesto->nombre }}</h3>
                        <p class="card-text">{{ $puesto->info }} €/kg</p>
                        <p class="card-text">Telefono contacto: {{ $puesto->telefono }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row producto">
        @foreach($productos as $item)
			<div class="card producto">
                <img class="card-img-top" src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nombre }}">
                <div class="card-body">
                    <h4 class="card-title"><a href="{{ Route('puesto.producto', ['idPro' => $item->idProPues]) }}">{{ $item->nombre }}</a></h4>
                    <p class="card-text">{{ $item->precio }} €/kg</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection