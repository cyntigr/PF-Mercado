@extends('navbar')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="card" style="width:300px">
            <img class="card-img-top perfil" src="{{ asset('storage') }}/{{ Auth::user()->foto}} " alt="Card image">
            <div class="card-body">
                <div class="form-row justify-content-center">
                    <h4 class="card-title">{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}</h4>
                </div>
                <div class="form-row justify-content-center">
                    <img class="logoM" src="{{ asset('img/m.png') }}" />
                </div>
            </div>
        </div>
        <div class="col-md-8">
                <div class="card transparent">
                    <div class="card-body">
                        <!-- Form edit user -->
                        <form method="POST" action="{{ route('perfil.edit') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-row">
                                <!-- Name user -->
                                <div class="form-group col-md-6">
                                    <label for="name" >Nombre</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->nombre }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Last name -->
                                <div class="form-group col-md-6">
                                    <label for="apellido" >Apellidos</label>
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ Auth::user()->apellido }}" required>
                                    @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <!-- Adress -->
                                <label for="direccion" >Dirección</label>
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ Auth::user()->direccion }}">
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <!-- Email -->
                                <div class="form-group col-md-6">
                                    <label for="email" >Email</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" disabled >
                                </div>

                                <!-- DNI -->
                                <div class="form-group col-md-6">
                                    <label for="dni" >DNI</label>
                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ Auth::user()->dni }}" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Phone -->
                                <div class="form-group col-md-6">
                                    <label for="telefono" >Teléfono</label>
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ Auth::user()->telefono }}" required>
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Birth date -->
                                <div class="form-group col-md-6">
                                    <label for="fecNa" >Fecha Nacimiento</label>
                                    <input type="date" id="fecNac" name="fecNac" class="form-control" name="fecNac" value="{{ Auth::user()->fecNac }}" disabled required>
                                </div>
                            </div>
                            @if( Auth::user()->idTipo == 3 )
                            <div class="form-row">
                                <!-- Credit Card -->
                                <div class="form-group col-md-6">
                                    <label for="tarjeta" >Número Tarjeta</label>
                                    <input id="tarjeta" type="number" class="form-control @error('tarjeta') is-invalid @enderror" name="tarjeta" value="{{ Auth::user()->tarjeta }}">
                                    @error('tarjeta')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Date -->
                                <div class="form-group col-md-4">
                                    <label for="caducidad" >Fecha Caducidad</label>
                                    <input id="caducidad" type="text" class="form-control @error('caducidad') is-invalid @enderror" name="caducidad" value="{{ Auth::user()->caducidad }}" >
                                    @error('caducidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- CVC -->
                                <div class="form-group col-md-2">
                                    <label for="cvc" >CVC</label>
                                    <input id="cvc" type="number" class="form-control @error('cvc') is-invalid @enderror" name="cvc" value="{{ Auth::user()->cvc }}">
                                    @error('cvc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            <div class="form-row">
                                @if( Auth::user()->idTipo == 2 )
                                <!-- NIF company -->
                                 <div class="form-group col-md-6">
                                    <label for="nif">NIF</label>
                                    <input id="nif" type="text" class="form-control" name="nif" value="{{ Auth::user()->nif }}" disabled>
                                </div>
                                @endif
                                <!-- Photo of user -->
                                <div class="form-group col-md-6">
                                    <label class="row-form-label" for="foto">Foto de perfil</label>
                                    <div class="custom-file mb-3">
                                        <input type="file" class="custom-file-input" id="customFile" name="foto">
                                        <label class="custom-file-label" for="foto">Elige la foto</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Button of register  -->
                            <button type="submit" class="btn btn-warning">Guardar cambios</button>
                            <!-- Button of delete user -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Darse de baja</button>
                        </form>
                        <!-- Modal -->
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        ¿ Estas seguro que quieres eliminar tu cuenta ?
                                        Se borraran todos los datos relacionados con tu cuenta.
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                        <form method="POST" action="{{ route('perfil.delete') }}" id="delete">
                                            @csrf
                                        </form>
                                        <button type="submit" form="delete" class="btn btn-success">Si</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection