@extends('navbar')

@section('content') 
    <div class="container py-4" id="app">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card transparent">
                    <div >
                        <div class="form-row justify-content-center">
                            <h3>Registro</h3>
                        </div>
                        <div class="form-row justify-content-center">
                            <img class="logoM" src="{{ asset('img/m.png') }}" />
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Form Register -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-row">
                                <!-- Name user -->
                                <div class="form-group col-md-6">
                                    <label for="name" >Nombre</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <!-- Last name -->
                                <div class="form-group col-md-6">
                                    <label for="apellido" >Apellidos</label>
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="apellido" autofocus>
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
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row">
                                <!-- Email -->
                                <email></email>

                                <!-- DNI -->
                                <dni></dni>
                            </div>
                            <div class="form-row">
                                <!-- Phone -->
                                <div class="form-group col-md-6">
                                    <label for="telefono" >Teléfono</label>
                                    <input id="telefono" type="text" class="form-control @error('teléfono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Birth date -->
                                <div class="form-group col-md-6">
                                    <label for="fecNa" >Fecha Nacimiento</label>
                                    <input type="date" id="fecNac" name="fecNac" class="form-control @error('fecNac') is-invalid @enderror" name="fecNac" value="{{ old('fecNac') }}" required autocomplete="fecNac" autofocus>
                                    @error('fecNac')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Password -->
                                <div class="form-group col-md-6">
                                    <label for="password" >Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- Confirmation password -->
                                <div class="form-group col-md-6">
                                    <label for="password-confirm" >Confirmar contraseña</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Request seller  -->
                                <div class="form-group col-md-6">
                                    <label for="foto">Crear perfil de vendedor:</label></br>
                                    <div class="form-check-inline">
                                        <label class="col-form-label text-md-right">
                                            <input type="radio" class="form-check-input" name="vendedor" value="1">Si
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="vendedor" value="0" checked >No
                                        </label>
                                    </div>
                                </div>
                                 <!-- NIF company -->
                                 <div class="form-group col-md-6">
                                    <label for="nif">NIF</label>
                                        <input id="nif" type="text" class="form-control @error('nif') is-invalid @enderror" name="nif" value="{{ old('nif') }}" autocomplete="nif" autofocus>
                                        @error('nif')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Note -->
                                <label >Aquellas personas que soliciten perfil vendedor,
                                    se verificara el usuario dado de alta y se le darán los permisos necesarios.
                                    Añadir NIF de la empresa para la verificación.
                                </label>
                            </div>
                            <!-- Button of register  -->
                            <button type="submit" class="btn btn-warning">Registrarse</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
