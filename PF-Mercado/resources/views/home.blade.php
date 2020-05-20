@extends('navbar')

@section('content')
    <div class="fondo">
        <div class="container">
            <div class="row puesto">
            @foreach($puestos as $item)
				<div class="card puesto" style="width: 16rem;">
                    <img src="{{ asset('storage/'.$item->foto) }}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title text-truncate ">{{ $item->nombre }}</h5>
                        <p class="card-text">{{ $item->info }}</p>
                        <a href="{{ route('puesto', ['id' => $item->idPuesto])}}" class="btn btn-warning ">Entrar</a>
                    </div>
                </div>
            @endforeach
            </div>

            <div class="row">
		        <div class="center">
			        {{ $puestos->links() }}
		        </div>
	        </div>
        </div>
    </div>
@endsection


					