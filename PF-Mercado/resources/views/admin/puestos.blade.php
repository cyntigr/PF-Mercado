@extends('navbar')
@section('content')
<div class="container py-4" id="app">
    <div class="row table-responsive" >
        <!-- Table of market stall  -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Gestor</th>
                    <th>Email</th>
                    <th>NIF</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puestos as $item)
                <tr>
                    <td>
                        <img class="imgPedido" src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nombre }}">
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->nif }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>
                        <a class="rojo ml-4" href="{{  route('puesto.delete',['idPuesto' => $item->idPuesto]) }}">
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