@extends('navbar')
@section('content')
<div class="container py-4">
<div class="row table-responsive" >
        <!-- Table of pending orders  -->
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
                    <th>Enviar</th>
                </tr>
            </thead>
            <tbody>
                <form method="POST" id="send" action="{{ route('pedido.send') }}" >
                    @csrf
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
                        <td>
                            <input name="send[]" type="checkbox" 
                                class="form-check-input ml-2" value="{{ $item->idPedido }}">
                        </td>
                    </tr>
                    @endforeach
                    
                </form>
            </tbody>
        </table>
        <button type="submit" form="send" class="btn btn-warning mt-4 float-right">Completar</button>
    </div>
</div>
@endsection