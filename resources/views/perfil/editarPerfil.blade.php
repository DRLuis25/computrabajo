@extends('welcome')
@section('content')
    
    <div style="margin-left: 200px; margin-right: 200px">

        <a class="btn btn-success" style="float: right">Cancelar</a>

        <h1 style="text-align: center">Datos del Perfil</h1>

        <h2>Informacion Personal: </h2>

        <form>
            <div class="form-group">
              <label for="exampleFormControlInput1">Nombres: </label>
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput2">Apellidos: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput3">Dirección: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput4">Celular: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect2">Habilidades: </label>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                  <option>Obrero</option>
                  <option>Constructor</option>
                  <option>Albañil</option>
                  <option>Pintor</option>
                  <option>Gasfitero</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput5">Oficio: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div>

            <div class="form-group">
                <label for="exampleFormControlInput6">Acerca de mí: </label>
                <textarea type="text" class="form-control" id="exampleFormControlInput1" placeholder=""></textarea>
            </div>
            
            <div class="row g-0" style="padding:3% 1% 1% 1%;">
                <div class="col-sm-4 col-md-4">Fecha de nacimiento:</div>
                <div class="col-4 col-md-4">
                    <input type="date" class="form-control" name="fecha" id="fecha"  aria-describedby="basic-addon1">
                </div>
            </div>

            <button class="btn btn-success"> Guardar</button>

        </form>

    </div>


@endsection
