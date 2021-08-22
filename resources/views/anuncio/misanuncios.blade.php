@extends('layouts.app')
@section('content')

<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <div class="text-end">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{ route("anuncio.misanuncios") }}" class="nav-link px-2 text-secondary">Mis anuncios</a></li>
                    <li><a href="{{ route("anuncio.publicaranuncio") }}" class="nav-link px-2 text-secondary">Publicar un Anuncio</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div style="margin:2% 20% 5% 20%">
    <div>
        <h3 class="card-title">Mis Anuncios</h3>
    </div>
    <form>
        <div class="input-group" style="margin: 2% 0% 5% 0%">
            <input name="buscarpor" class="form-control rounded" placeholder="" aria-label="Search" value="{{ $buscarpor }}" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-warning">BUSCAR</button>
        </div>
    </form>

    <div class="">
        <b>
            <div class="card-body">
                <div class="row g-0" style="text-align: center">
                    <div class="col-sm-6 col-md-6"></div>
                    <div class="col-sm-2 col-md-2">Monto</div>
                    <div class="col-sm-2 col-md-2">Inscritos</div>
                    <div class="col-sm-2 col-md-2">Acciones</div>
                </div>
            </div>
        </b>
    </div>

    @foreach($anuncio as $itemAnuncio)
    <div style="margin-bottom: 30px">
        <div class="card">
            <div class="card-body">
                <div class="row g-0">
                    <div class="col-sm-6 col-md-6">
                        <h5 class="card-title" style="color: #2A5C98">
                            @if ($itemAnuncio->estado=='1')
                            <a href="{{route('anuncio.finalizar',[$itemAnuncio->id])}}" >{{ $itemAnuncio->titulo }}</a>
                            @else
                            {{ $itemAnuncio->titulo }}
                            @endif
                        </h5>
                        <div>{{$itemAnuncio->departamento->nombre}} - {{$itemAnuncio->ciudad->nombre}} - {{$itemAnuncio->distrito->nombre}}</div>
                        <div>Expira el {{ date_format($itemAnuncio->fecha_expiracion, 'd/m/Y') }}</div>
                        
                    </div>
                    <div class="col-sm-2 col-md-2" style="display: table; text-align: center; font-size: 20px; color:green">
                        <div style="display: table-cell; vertical-align: middle;">
                        <b>
                            <div>{{ 'S/ '.number_format($itemAnuncio->pago_propuesto_min, 2)  }}</div>
                            <div>{{'S/ '.number_format($itemAnuncio->pago_propuesto_max, 2) }}</div>
                        </b>
                    </div>
                    </div>
                    <div class="col-sm-2 col-md-2" style="display: table;font-size: 40px; text-align: center; color:red">
                        <div style="display: table-cell; vertical-align: middle;">
                            <a href="{{route('publicacion.comienzo',$itemAnuncio->id)}}" style="text-decoration:none">{{ $itemAnuncio->userAnuncios == null ? '0' : $itemAnuncio->userAnuncios->count() }}</a>
                        </div>
                    </div>
                    <div class="col-sm-2 col-md-2" style="display: table;text-align: center">
                        <div style="display: table-cell; vertical-align: middle;">
                        @if ($itemAnuncio->estado == 0)
                            <a href="{{ route("anuncio.editaranuncio", $itemAnuncio->id) }}" style="font-size: 25px"><i class="fa fa-edit"></i></a>
                        @endif
                        <div>Estado</div>
                        <div>
                            @if ($itemAnuncio->estado == 0)
                                INACTIVO
                            @else
                                @if ($itemAnuncio->estado == 1)
                                    EN PROCESO
                                @else
                                    FINALIZADO
                                @endif
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{$anuncio->links()}}
</div>
</div>

@endsection
