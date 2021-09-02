@extends('welcome')
@section('content')
    
    <div style="margin-left: 200px; margin-right: 200px">

        <a href="{{route('perfilUsuario.index')}}" class="btn btn-success" style="float: right">Cancelar</a>

        <h1 style="text-align: center">Datos del Perfil</h1>

        <h2>Información Personal: </h2>

        <form action="{{route('perfilUsuario.update',$usuario->id)}}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
              <label for="name">Nombres: </label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$usuario->name}}">
                @error('name')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="apellidos">Apellidos: </label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="apellidos" value="{{$usuario->apellidos}}">
                @error('apellidos')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="direccion">Dirección: </label>
                <input type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{$usuario->direccion}}">
                @error('direccion')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="acerca">Acerca de mí: </label>
                <textarea type="text" class="form-control @error('acerca') is-invalid @enderror" name="acerca" >{{$usuario->acerca_de_mi}}</textarea>
                @error('acerca')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="experiencia">Experiencia: </label>
                <textarea type="text" class="form-control @error('name') is-invalid @enderror" name="experiencia">{{$usuario->experiencia}}</textarea>
                @error('experiencia')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
            </div>
            <br>
            {{-- <div class="form-group">
                <label for="exampleFormControlSelect2">Habilidades: </label>
                <select multiple class="form-control" id="exampleFormControlSelect2">
                  <option>Obrero</option>
                  <option>Constructor</option>
                  <option>Albañil</option>
                  <option>Pintor</option>
                  <option>Gasfitero</option>
                </select>
            </div> --}}

            {{-- <div class="form-group">
                <label for="exampleFormControlInput5">Oficio: </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="">
            </div> --}}

            <button type="submit" class="btn btn-primary"> Actualizar Datos </button>

        </form>

    </div>


@endsection
