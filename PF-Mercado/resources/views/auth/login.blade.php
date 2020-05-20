@extends('navbar')

@section('content')
<div class="container py-4" id="app">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body ">
                    <div class="form-row justify-content-center">
                        <h3>Iniciar Sesión</h3>
                    </div>
                    <div class="form-row justify-content-center">
                        <img class="logoM" src="{{ asset('img/m.png') }}" />
                    </div>
                    <!-- Form Login -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span  class="input-group-text">
                                            <i class="fas fa-user-friends"></i>
                                        </span>
                                    </div>
                                    <input id="email" type="email" class="form-control @error('email')
                                    is-invalid @enderror" name="email" 
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="password" >Contraseña</label>
                                <password mandatory></password>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recordar
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <button type="submit" class="btn btn-warning col-md-6">
                                Entrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
