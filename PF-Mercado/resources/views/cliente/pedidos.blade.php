@extends('navbar')

@section('content')
<div class="container py-4">
<table class="table table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Puesto</th>
            <th>Cantidad</th>
            <th>Peso</th>
            <th>Fecha</th>
            <th>Enviado</th>
            <th>Pagado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $item)
        <tr>
            <td>
                <img class="imgPedido" src="{{ asset('storage/'.$item->foto) }}" alt="{{ $item->nombre }}">
            </td>
            <td>{{ $item->nombre }}</td>
            <td>{{ $item->puesto }}</td>
            <td>{{ $item->cantidad }}</td>
            <td>{{ $item->peso }} g</td>
            <td> @date($item) </td>
            <td>@if($item->enviado == 0) No @else Si @endif</td>
            <td>{{ $item->total }} €</td>
        </tr>
        @endforeach
    </tbody>
  </table>
    
</div>
@endsection