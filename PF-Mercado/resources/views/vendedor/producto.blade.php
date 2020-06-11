@extends('navbar')

@section('content')
    <div class="container py-4" id="app">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-4 ">
                        <!-- Photo Product -->
                        <img class="card-img pl-4 pr-4" 
                             src="{{ asset('storage') }}/{{ $producto->foto ?? 'ejemplo.jpg' }}" 
                             alt="{{ $producto->nombre ?? 'Producto' }}">
                    </div>
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('producto.save') }}" enctype="multipart/form-data">
                            @csrf
                                <input name="idPuesto" type="hidden" value="{{ $producto->idPuesto ?? $idPuesto }}" >
                            @isset($producto)
                                <input name="idProPues" type="hidden" value="{{ $producto->idProPues }}" >
                            @endisset
                            <div class="card-body">
                                <div class="form-row">
                                    <!-- Name product -->
                                    <div class="form-group col-md-6">
                                        <label for="nombre" >Nombre</label>
                                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') ?? $producto->nombre ?? '' }}" required autocomplete="nombre" autofocus>
                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <!-- Price -->
                                    <div class="form-group col-md-6">
                                        <label for="precio" >Precio</label>
                                        <div class="input-group">
                                            <input id="precio" type="number" step="0.001" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') ?? $producto->precio ?? '' }}" required autocomplete="precio" autofocus>
                                                @error('precio')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">€/kg</span>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- Description of the product -->
                                    <div class="form-group col-md-12">
                                        <label for="validationTextarea">Descripción producto</label>
                                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"  required autocomplete="descripcion" autofocus>{{ old('descripcion') ?? $producto->descripcion ?? '' }} </textarea>
                                        @error('descripcion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- Photo product -->
                                    <div class="form-group col-md-6">
                                        <label class="row-form-label" for="foto">Foto producto</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="foto">
                                            <label class="custom-file-label" for="foto">Elige la foto</label>
                                        </div>
                                    </div>
                                    <!-- Stock of the product -->
                                    <div class="form-group col-md-6">
                                        <label class="row-form-label" for="stock">Stock</label>
                                        <select name="stock" class="custom-select">
                                            <option value="1">Si</option>
                                            @empty($producto)
                                            <option value="0">No</option>
                                            @endempty
                                            @isset($producto)
                                                @if($producto->stock == 0)
                                                <option value="0" selected>No</option>
                                                @else
                                                <option value="0">No</option>
                                                @endif
                                            @endisset
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning mb-4 float-right">Guardar</button>
                                <button type="button" class="btn btn-warning mb-4 mr-2 float-right">
                                    <a class="blanco" href="{{ route('puesto.add',['idPuesto' => $producto->idPuesto ?? $idPuesto]) }}">
                                        Volver
                                    </a>
                                </button>
                            </div>
                            
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection