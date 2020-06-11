@extends('navbar')
@section('content')
<div class="container py-4">
    <div class="row table-responsive" >
        <!-- Table of products  -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Precio / kg</th>
                    <th>Stock</th>
                    <th>Puesto</th>
                    <th>Gestor</th>
                    <th>NIF</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $item)
                <tr>
                    <td>
                        <img class="imgPedido" src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nombre }}">
                    </td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->descripcion }}</td>
                    <td>{{ $item->precio }} €</td>
                    <td>@if( $item->stock == 0) No @else Si @endif</td>
                    <td>{{ $item->nomb }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->nif }}</td>
                    <td>
                        <a class="rojo ml-4" href="{{  route('producto.delete',['idPro' => $item->idProPues]) }}">
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