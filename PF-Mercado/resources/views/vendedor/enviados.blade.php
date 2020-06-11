@extends('navbar')
@section('content')
<div class="container py-4">
    <div class="row table-responsive" >
        <!-- Table of orders sends  -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Puesto</th>
                    <th>Cantidad</th>
                    <th>Cliente</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Fecha</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $item)
                <tr>
                    <td>{{ $item->idPedido }}</td>
                    <td>{{ $item->nombreP }}</td>
                    <td>{{ $item->nombrePuesto }}</td>
                    <td>{{ $item->cantidad * $item->peso }} g</td>
                    <td>{{ $item->nombre }} {{ $item->apellido}}</td>
                    <td>{{ $item->direccion }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>@date($item)</td>
                    <td>{{ $item->total }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection