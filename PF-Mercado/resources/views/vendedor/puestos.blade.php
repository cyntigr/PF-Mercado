@extends('navbar')
@section('content')
<div class="container py-4">
    <div class="row table-responsive" >
        <!-- Table of market stall  -->
        <button type="button" class="btn btn-warning mt-4 mb-4 "><a class="blanco" href="{{ route('puesto.add') }}">Nuevo Puesto</a></button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Info</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puestos as $item)
                <tr>
                    <td>
                        <img class="imgPedido" 
                            src="{{ asset('storage/'.$item->foto) }}" 
                            alt="{{ $item->nombre }}">
                    </td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->info }} g</td>
                    <td>
                        <a class="naranja ml-3" href="{{  route('puesto.add',['idPuesto' => $item->idPuesto]) }}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                    </td>

                    <td>
                        <a class="rojo ml-3" href="{{  route('puestos.delete',['idPuesto' => $item->idPuesto]) }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection