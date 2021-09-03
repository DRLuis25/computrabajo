@extends('layouts.app')
@section('content')
@include('anuncio.header')
<form method="POST" action="{{route('anuncio.guardaranuncio')}}">
@csrf
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
                        <input type="date" class="form-control @error('fecha_expiracion') is-invalid @enderror" name="fecha_expiracion" id="fecha_expiracion" aria-describedby="basic-addon1">
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
                        <input class="form-check-input" type="radio" name="radioemail" id="radioemail" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radioemail" id="radioemail" value="0">
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
                        <input class="form-check-input" type="radio" name="radiotelefono" id="radiotelefono" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiotelefono" id="radiotelefono" value="0">
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
                        <input class="form-check-input" type="radio" name="radiodireccion" id="radiodireccion" value="1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiodireccion" id="radiodireccion" value="0">
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
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" id="titulo" aria-describedby="basic-addon1">
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
                        <select class="form-select @error('idoficio') is-invalid @enderror" aria-label="Default select example" name="idoficio" id="idoficio">
                            <option value="">Seleccione ...</option>
                            @foreach($oficio as $itemOficio)
                                <option value="{{ $itemOficio->id }}">{{ $itemOficio->nombre }}</option>
                            @endforeach
                        </select>
                        @error('idoficio')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="form-group col-sm-8 col-md-8">
                        <label for="exampleFormControlTextarea1" style="margin-bottom:20px">Descripción de tareas :</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" id="descripcion" rows="3"></textarea>
                        @error('descripcion')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Pago:</div>
                    <div class="col-2 col-md-2">
                        <input type="number" placeholder="Min" class="form-control @error('min') is-invalid @enderror" name="min" id="min" aria-describedby="basic-addon1">
                        @error('min')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-1 col-md-1" style="margin: 0px 5px 0px 5px; text-align: center">-</div>
                    <div class="col-2 col-md-2">
                        <input type="number" placeholder="Max" class="form-control @error('max') is-invalid @enderror" name="max" id="max" aria-describedby="basic-addon1">
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
                        <select class="form-select @error('departamento_id') is-invalid @enderror" aria-label="Default select example" name="departamento_id" id="departamento_id" onchange="mostrarCiudades()">
                            <option value="">Seleccione ...</option>
                            @foreach($departamento as $itemDepartamento)
                                <option value="{{$itemDepartamento['id']}}">{{$itemDepartamento['nombre']}}</option>
                            @endforeach
                        </select>
                        @error('departamento_id')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Ciudad:</div>
                    <div class="col-sm-4 col-md-4">
                        <select class="form-select @error('ciudad_id') is-invalid @enderror" aria-label="Default select example" name="ciudad_id" id="ciudad_id" onchange="mostrarDistritos()">
                        </select>
                        @error('ciudad_id')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 3% 1%;">
                    <div class="col-sm-4 col-md-4">Distrito:</div>
                    <div class="col-sm-4 col-md-4">
                        <select class="form-select @error('distrito_id') is-invalid @enderror" aria-label="Default select example" name="distrito_id" id="distrito_id">
                        </select>
                        @error('distrito_id')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div style="text-align:center; padding: 4% 0% 6% 0%">
        <button type="submit" class="btn btn-warning" style="height: 50px; width: 400px;"><b>Publicar</button>
    </div>
</div>

</form>

@endsection

@section('script')


<script>
    function mostrarCiudades() {
        idDepartamento = $('#departamento_id').val();
        $('#ciudad_id').empty();
        $('#distrito_id').empty();
        $.get('/getCiudad/' + idDepartamento, function(data) {
            var ciudad = '<option value="" id="ciudad_id">- Seleccione Provincia -</option>'
            for (var i = 0; i < data.length; i++)
                ciudad += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';
            $("#ciudad_id").html(ciudad);
        });
    }

    function mostrarDistritos() {
        $('#distrito_id').empty();
        idCiudad = $('#ciudad_id').val();
        $.get('/getDistrito/' + idCiudad, function(data) {
            var distrito = '<option value="" id="distrito_id">- Seleccione Distrito -</option>'
            for (var i = 0; i < data.length; i++)
                distrito += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';
            $("#distrito_id").html(distrito);
        });
    }

</script>

@endsection
