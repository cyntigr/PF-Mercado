@extends('navbar')
@section('head')<script src="{{ asset('js/tipo.js') }}" defer></script>@endsection
@section('content')
<div class="container py-4">
    <!-- Table of users  -->
    <div class="row">
        <table class="table table-responsive table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>NIF</th>
                    <th>Solicita<br/>Vendedor</th>
                    <th>Tipo</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!-- Form for change type of user  -->
                <form method="POST" action="{{ route('usuario.tipo') }}">
                    @csrf
                    <input id="dni" type="hidden" name="dni" value="" />
                    <input id="tipo" type="hidden" name="tipo" value="" />
                </form>

                @foreach($usuarios as $item)
                <tr>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellido }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->dni }}</td>
                    <td>{{ $item->telefono }}</td>
                    <td>{{ $item->nif }}</td>
                    <td>@if( $item->vendedor == 0) No @else Si @endif </td>
                    <td>
                        <select class="custom-select" id="{{ $item->dni }}" data-dni="{{ $item->dni }}">
                            <option value="1"> Administrador </option>
                            <option value="2" @if( $item->idTipo == 2) selected @endif > Vendedor </option>
                            <option value="3" @if( $item->idTipo == 3) selected @endif > Cliente </option>
                        </select>
                    </td>
                    <td>
                        <a class="rojo ml-4" href="{{  route('usuario.delete',['dni' => $item->dni]) }}">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection