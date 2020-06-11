@extends('navbar')
@section('head')<script src="{{ asset('js/total.js') }}" defer></script>@endsection
@section('content')
<div class="container py-4">
    <!-- Table of pendings orders  -->
    <div class="row table-responsive" >
        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Peso</th>
                    <th>Precio</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Form for pay pending orders  -->
                <form method="POST" id="pay" action="{{ route('pedido.pay') }}">
                    @csrf
                    @foreach($pedidos as $item)
                    <tr>
                        <td>
                            <input name="pay[]" type="checkbox" 
                                   class=" ml-2 form-check-input" value="{{ $item->idPedido }}"  
                                   onClick="actualizarTotal(this.checked,{{ $item->total }})">
                        </td>
                        <td>
                            <img class="imgPedido" src="{{ asset('storage/'.$item->foto) }}" 
                                 alt="{{ $item->nombre }}">
                        </td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->cantidad }}</td>
                        <td>{{ $item->peso }} g</td>
                        <td>{{ $item->total }} €</td>
                        <td>
                            <a class="rojo ml-4" href="{{  route('pedido.delete',['id' => $item->idPedido]) }}">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </form>
            </tbody>
        </table>
    </div>
    
    <!-- Message of error  -->
    @foreach ($errors->all() as $message) 
    <div class="row">
        <div class="col-md-12 alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ $message }}
        </div>
    </div>
    @endforeach

    
    <div class="d-flex flex-row-reverse mt-4">
        <div>
            <!-- Button of pay  -->
            <button type="submit" form="pay" class="btn btn-warning ">
                Pagar 
                <i class="fas fa-credit-card"></i>
            </button>
        </div>
        <div class="mr-2">
            <div id="inputTotal" class="input-group mb-3">
                <!-- Money to pay  -->
                <input class="form-control" type="text" readonly id="total" value="0" />
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">€</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
