@extends('navbar')

@section('content')
<div class="container py-4">
    <div class="row producto">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4 align-self-center">
                    <img class="card-img" src="{{ asset('storage/'.$producto->foto) }}" alt="{{ $producto->nombre }}">
                </div>
                <div class="col-md-6">
                    <form method="POST" action="{{ route('producto.add', ['idPro' => $producto->idProPues]) }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                <h1 class="card-title">{{ $producto->nombre }}</h1><br/>
                                <p class="card-text">{{ $producto->descripcion }}</p>
                                <p class="card-text">Precio: {{ $producto->precio }} €/kg</p>
                            </div>
                            <div class="form-row">
                                <!-- Weight -->
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="peso">Peso</label>
                                        <select class="form-control" type="number" id="peso" name="peso">
                                            <option value="1000">1000g</option>
                                            <option value="500">500g</option>
                                            <option value="250">250g</option>
                                            <option value="100">100g</option>
                                            <option value="50">50g</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <!-- Quantity -->
                                    <div class="form-group ">
                                        <label for="cantidad">Cantidad</label>
                                        <input id="cantidad" type="number" class="form-control" name="cantidad" value="">
                                    </div>
                                </div>
                            </div>

                            @if($producto->stock == 0)
                                <div class="form-row">
                                    <div class="alert alert-info col-md-12 pl-4">
                                        No hay stock disponible
                                    </div>
                                </div>
                            @endif
                            
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <button type="button" class="btn btn-warning">
                                        <a class="blanco" href="{{ route('puesto',['id' => $producto->idPuesto]) }}">Volver atrás</a>
                                    </button>
                                </div>
                                <div class="form-group col-md-6">
                                    <button type="submit" class="btn btn-success" 
                                        @Auth 
                                            @if(Auth::user()->idTipo !== 3 )
                                                disabled
                                            @endif
                                        @endauth
                                        @guest
                                            disabled
                                        @endguest
                                        @if($producto->stock == 0)
                                            disabled
                                        @endif
                                        >
                                        Añadir cesta
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection