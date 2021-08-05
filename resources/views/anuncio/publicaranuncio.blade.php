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
                        <input type="date" class="form-control" name="fecha" id="fecha" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row g-0" style="padding:1%;">
                    <div class="col-sm-4 col-md-4">Estado :</div>
                    <div class="col-2 col-md-2">
                        <input class="form-check-input" type="radio" name="radioestado" id="radioestado">
                        <label class="form-check-label" for="flexRadioDefault1">
                            ACTIVO
                        </label>
                    </div>
                    <div class="col-2 col-md-2">
                        <input class="form-check-input" type="radio" name="radioestado" id="radioestado">
                        <label class="form-check-label" for="flexRadioDefault1">
                            INACTIVO
                        </label>
                    </div>
                </div>
                <div class="row g-0" style="padding:1%;">
                    <div class="col-sm-4 col-md-4">Mostrar e-mail de contacto :</div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radioemail" id="radioemail">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radioemail" id="radioemail">
                        <label class="form-check-label" for="flexRadioDefault1">
                            NO
                        </label>
                    </div>
                </div>
                <div class="row g-0" style="padding:1%;">
                    <div class="col-sm-4 col-md-4">Mostrar telefono de contacto :</div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiotelefono" id="radiotelefono">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiotelefono" id="radiotelefono">
                        <label class="form-check-label" for="flexRadioDefault1">
                            NO
                        </label>
                    </div>
                </div>
                <div class="row g-0" style="padding:1% 1% 3% 1%;">
                    <div class="col-sm-4 col-md-4">Mostrar dirección de contacto :</div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiodireccion" id="radiodireccion">
                        <label class="form-check-label" for="flexRadioDefault1">
                            SI
                        </label>
                    </div>
                    <div class="col-1 col-md-1">
                        <input class="form-check-input" type="radio" name="radiodireccion" id="radiodireccion">
                        <label class="form-check-label" for="flexRadioDefault1">
                            NO
                        </label>
                    </div>
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
                        <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Oficio:</div>
                    <div class="col-sm-4 col-md-4">
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">Carpintería</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="form-group col-sm-8 col-md-8">
                        <label for="exampleFormControlTextarea1" style="margin-bottom:20px">Descripción de tareas :</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Pago:</div>
                    <div class="col-1 col-md-1">
                        <input type="text" placeholder="Min" class="form-control" name="min" id="min" aria-describedby="basic-addon1">
                    </div>
                    <div class="col-1 col-md-1" style="margin: 0px 5px 0px 5px; text-align: center">-</div>
                    <div class="col-1 col-md-1">
                        <input type="text" placeholder="Max" class="form-control" name="max" id="max" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Departamento:</div>
                    <div class="col-sm-4 col-md-4">
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">La Libertad</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 1% 1%;">
                    <div class="col-sm-4 col-md-4">Provincia:</div>
                    <div class="col-sm-4 col-md-4">
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">Trujillo</option>
                        </select>
                    </div>
                </div>
                <div class="row g-0" style="padding:3% 1% 3% 1%;">
                    <div class="col-sm-4 col-md-4">Distrito:</div>
                    <div class="col-sm-4 col-md-4">
                        <select class="form-select" aria-label="Default select example">
                            <option value="1">Trujillo</option>
                        </select>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div style="text-align:center; padding: 4% 0% 6% 0%">
        <button type="submit" class="btn btn-warning" style="height: 50px; width: 400px;"><b>Publicar</button>
    </div>
</div>

@endsection
