@extends('navbar')
@section('script')
    <script src="{{ asset('js/stock.js') }}" defer></script>
@endsection
@section('content')
    <div class="container py-4" id="app">
        <div class="row justify-content-center">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4 mt-4 ">
                        <!-- Photo market stall -->
                        <img class="card-img pl-4 pr-4" 
                             src="{{ asset('storage') }}/{{ $puesto->foto ?? 'puesto.jpg' }}" 
                             alt="{{ $puesto->nombre ?? 'puesto' }}">
                    </div>
                    <div class="col-md-8">
                        <form method="POST" action="{{ route('puesto.save') }}" enctype="multipart/form-data">
                            @csrf
                            @isset($puesto)
                                <input name="idPuesto" type="hidden" value="{{ $puesto->idPuesto }}" >
                            @endisset
                            <div class="card-body">
                                <div class="form-row">
                                    <!-- Name market stall -->
                                    <div class="form-group col-md-6">
                                        <label for="nombre" >Nombre</label>
                                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') ?? $puesto->nombre ?? '' }}" required autocomplete="nombre" autofocus>
                                            @error('nombre')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <!-- Phone number -->
                                    <div class="form-group col-md-6">
                                        <label for="telefono" >Teléfono</label>
                                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') ?? $puesto->telefono ?? '' }}" required autocomplete="telefono" autofocus>
                                            @error('telefono')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- Description of the market stall -->
                                    <div class="form-group col-md-12">
                                        <label for="validationTextarea">Información puesto</label>
                                        <textarea class="form-control @error('info') is-invalid @enderror" name="info"  required autocomplete="info" autofocus>{{ old('info') ?? $puesto->info ?? '' }} </textarea>
                                        @error('info')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <!-- Photo market stall -->
                                    <div class="form-group col-md-12">
                                        <label class="row-form-label" for="foto">Foto del puesto</label>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="customFile" name="foto">
                                            <label class="custom-file-label" for="foto">Elige la foto</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-warning mb-4 float-right">Guardar</button>
                            </div>
                            
                        </form>   
                    </div>
                </div>
            </div>
            @empty($puesto)
            <div class="row ">
                <div class="col-md-12">
                    <div class="alert alert-info">
                        <strong>Información:</strong> Una vez creado el puesto, se podrán 
                        editar y añadir los productos deseados.
                    </div>
                </div>
            </div>
            @endempty
            @isset($puesto)
            <div class="row table-responsive">
                <div class="col-md-12">
                    <button type="button" class="btn btn-warning mt-4 mb-4 ">
                        <a class="blanco" href="{{ route('producto.new',['idPuesto' => $puesto->idPuesto]) }}">Nuevo Producto</a>
                    </button>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($productos)
                                @foreach($productos as $item)
                                <tr>
                                    <td>
                                        <img class="imgPedido" 
                                            src="{{ asset('storage/'.$item->foto) }}" 
                                            alt="{{ $item->nombre }}">
                                    </td>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->precio }} €/kg</td>
                                    <td>{{ $item->descripcion }}</td>
                                    <td>
                                        @if( $item->stock == 1) Si @else No  @endif 
                                    </td>
                                    <td>
                                        <a class="naranja ml-3" href="{{  route('producto.new',['idProPues' => $item->idProPues]) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>

                                    <td>
                                        <a class="rojo ml-3" href="{{  route('productos.delete',['idProPues' => $item->idProPues]) }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
            @endisset
        </div>
    </div>
@endsection