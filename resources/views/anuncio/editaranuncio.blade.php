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
<form method="POST" action="{{ route('anuncio.update', $anuncio->id) }}" class="form-horizontal form-label-left">
    @csrf
    @method('put')
    <div style="margin-left:12%; width: 76%;">
    <div class="card">
        <div class="card-header" style="color:#2A5C98;">
            <b>Características del Anuncio</b>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="padding-left: 10%">
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Fecha de expiración :</div>
                    <div class="col-4 col-md-4">
                        <input type="date" class="form-control @error('fecha_expiracion') is-invalid @enderror" name="fecha_expiracion" id="fecha_expiracion" value="{{ date_format($anuncio->fecha_expiracion, 'Y-m-d') }}" aria-describedby="basic-addon1">
                        @error('fecha_expiracion')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-0" style="padding:1%;">
                    <div class="col-sm-4 col-md-4">Mostrar e-mail de contacto :</div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radioemail" id="radioemail" {{ $anuncio->ver_email == true ? 'checked' : '' }} value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radioemail" id="radioemail" {{ $anuncio->ver_email == false ? 'checked' : '' }} value="0">
                        <label class="form-check-label" for="flexRadioDefault1">
                            NO
                        </label>
                    </div>
                    @error('radioemail')
                        <div class="col-2 col-md-2" id="validationServer03Feedback" style="font-size: 10pt; color:#DD5557">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row g-0" style="padding:1%;">
                    <div class="col-sm-4 col-md-4">Mostrar telefono de contacto :</div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiotelefono" id="radiotelefono" {{ $anuncio->ver_celular == true ? 'checked' : '' }} value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiotelefono" id="radiotelefono" {{ $anuncio->ver_celular == false ? 'checked' : '' }} value="0">
                        <label class="form-check-label" for="flexRadioDefault1">
                            NO
                        </label>
                    </div>
                    @error('radiotelefono')
                        <div class="col-2 col-md-2" id="validationServer03Feedback" style="font-size: 10pt; color:#DD5557">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="row g-0" style="padding:1% 1% 3% 1%;">
                    <div class="col-sm-4 col-md-4">Mostrar dirección de contacto :</div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiodireccion" id="radiodireccion" {{ $anuncio->ver_direccion == true ? 'checked' : '' }} value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiodireccion" id="radiodireccion" {{ $anuncio->ver_direccion == false ? 'checked' : '' }} value="0">
                        <label class="form-check-label" for="flexRadioDefault1">
                            NO
                        </label>
                    </div>
                    @error('radiodireccion')
                        <div class="col-2 col-md-2" id="validationServer03Feedback" style="font-size: 10pt; color:#DD5557">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header" style="color:#2A5C98;">
            <b>Datos del Anuncio</b>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="padding-left: 10%">
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Título del anuncio :</div>
                    <div class="col-4 col-md-4">
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo" value="{{ $anuncio->titulo }}">
                        @error('titulo')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Oficio:</div>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" class="form-control" name="oficio" id="oficio" aria-describedby="basic-addon1" value="{{ $anuncio->oficio->nombre }}" disabled>
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="form-group col-sm-8 col-md-8">
                        <label for="descripcion" style="margin-bottom:20px">Descripción de tareas :</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ $anuncio->descripcion }}</textarea>
                        @error('descripcion')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Pago:</div>
                    <div class="col-1 col-md-1">
                        <input type="text" placeholder="Min" class="form-control @error('min') is-invalid @enderror" name="min" id="min" aria-describedby="basic-addon1" value="{{ $anuncio->pago_propuesto_min }}">
                        @error('min')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-1 col-md-1" style="margin: 0px 5px 0px 5px; text-align: center">-</div>
                    <div class="col-1 col-md-1">
                        <input type="text" placeholder="Max" class="form-control @error('max') is-invalid @enderror" name="max" id="max" aria-describedby="basic-addon1" value="{{ $anuncio->pago_propuesto_max }}">
                        @error('max')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Departamento:</div>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" class="form-control" name="departamento_id" id="departamento_id" aria-describedby="basic-addon1" value="{{ $anuncio->departamento->nombre }}" disabled>
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Provincia:</div>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" class="form-control" name="provincia_id" id="provincia_id" aria-describedby="basic-addon1" value="{{ $anuncio->ciudad->nombre }}" disabled>
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 3% 1%;">
                    <div class="col-sm-4 col-md-4">Distrito:</div>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" class="form-control" name="distrito_id" id="distrito_id" aria-describedby="basic-addon1" value="{{ $anuncio->distrito->nombre }}" disabled>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div style="text-align:center; padding: 4% 0% 6% 0%">
        <button type="submit" class="btn btn-warning" style="height: 50px; width: 400px;"><b>Editar</button>
    </div>
    </div>
</form>

@endsection
