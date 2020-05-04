@extends('navbar')

@section('content')

    <video id="video"  muted="muted" autoplay loop>
        <source src="{{ asset('img/mercado.mp4') }}">
    </video>
    <div id="capaFondo"></div>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card transparent">
                    <div class="card-header">Registro</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            <div class="form-row">
                                <!-- Nombre usuario -->
                                <div class="form-group col-md-6">
                                    <label for="name" >Nombre</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <!-- Apellidos -->
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
                            <!-- Dirección -->
                            <div class="form-group">
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
                                <div class="form-group col-md-6">
                                    <label for="email" >Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- DNI -->
                                <div class="form-group col-md-6">
                                    <label for="dni" >DNI</label>
                                    <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>
                                    @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Telefono -->
                                <div class="form-group col-md-6">
                                    <label for="telefono" >Teléfono</label>
                                    <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <!-- Contraseña -->
                                <div class="form-group col-md-6">
                                    <label for="password" >Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Confirmación contraseña -->
                                <div class="form-group col-md-6">
                                    <label for="password-confirm" >Confirmar contraseña</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                                <!-- NIF si es vendedor -->
                                <div class="form-group col-md-6">
                                    <label for="nif">NIF</label>
                                        <input id="nif" type="text" class="form-control @error('nif') is-invalid @enderror" name="nif" value="{{ old('nif') }}" required autocomplete="nif" autofocus>
                                        @error('nif')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <!-- Solicita Vendedor -->
                                <div class="form-group col-md-6">
                                    <label for="foto">Crear perfil de vendedor:</label></br>
                                    <div class="form-check-inline">
                                        <label class="col-form-label text-md-right">
                                            <input type="radio" class="form-check-input" name="vendedor" value="true">Si
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="vendedor" value="false">No
                                        </label>
                                    </div>
                                </div>
                                <!-- Nota informativa -->
                                <div class="form-group col-md-6">
                                    <label >Solo para aquellas personas que tienen un puesto en el Mercado,
                                        se verificaran los datos una vez dado de alta y se le darán los permisos necesarios si todo es correcto.
                                        Añadir NIF de la empresa para verificación.
                                    </label>
                                </div>
                            </div>
                            <!-- Botón de registro  -->
                            <button type="submit" class="btn btn-primary">Registrarse</button>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
