@extends('navbar')

@section('content')
<div class="container py-4">
    <div class="row">
    
    </div>
    <div class="row">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img class="card-img" src="{{ asset('storage/'.$puesto->foto) }}" alt="{{ $puesto->nombre }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <div class="form-row">
                            <h3 class="card-title">{{ $puesto->nombre }}</h3>
                            <p class="card-text">{{ $puesto->info }} €/kg</p>
                            <p class="card-text">Telefono contacto: {{ $puesto->telefono }}</p>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <a class="blanco btn btn-warning 
                                        @Auth 
                                            @if(Auth::user()->idTipo !== 3 )
                                                disabled
                                            @endif
                                        @endauth
                                        @guest
                                            disabled
                                        @endguest" 
                                    aria-disabled="true" href="{{ route('puesto.favourite',['id' => $puesto->idPuesto]) }}">
                                    Añadir favorito
                                </a>
                            </div>
                            <div class="form-group col-md-3">
                                <a class="blanco btn btn-warning 
                                        @Auth 
                                            @if(Auth::user()->idTipo !== 3 )
                                                disabled
                                            @endif
                                        @endauth
                                        @guest
                                            disabled
                                        @endguest" 
                                    aria-disabled="true" href="{{ route('favorito.delete',['id' => $puesto->idPuesto]) }}">
                                    Eliminar favorito
                                </a>
                            </div>
                        </div>
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
                    <h4 class="card-title"><a href="{{ Route('producto', ['idPro' => $item->idProPues]) }}">{{ $item->nombre }}</a></h4>
                    <p class="card-text">{{ $item->precio }} €/kg</p>
                </div>
            </div>
        @endforeach
    </div>
</>
@endsection