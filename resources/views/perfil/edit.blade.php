@extends('welcome')
@section('content')
    
    <div style="margin-left: 300px; margin-right: 300px">

        <a href="{{route('perfilUsuario.index')}}" class="btn btn-success" style="float: right">Cancelar</a>

        <h1 style="text-align: center">Datos del Perfil</h1>

        <h3>Información Personal: </h3>

        <form action="{{route('perfilUsuario.update',$usuario->id)}}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Dni: </label>
                <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{$usuario->dni}}">
                  @error('dni')
                          <div id="validationServer03Feedback" class="invalid-feedback">
                              {{ $message }}
                          </div>
                  @enderror
            </div>
            <br>
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
                <input type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{$usuario->apellidos}}">
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
                <textarea type="text" class="form-control @error('experiencia') is-invalid @enderror" name="experiencia">{{$usuario->experiencia}}</textarea>
                @error('experiencia')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <label for="oficios">Oficio: </label>
                <select multiple class="form-control @error('oficios') is-invalid @enderror" name="oficios" style="height: 148px">
                    @foreach ($oficios as $oficio)
                        <option value={{$oficio->id}} 
                            
                            @foreach ($usuario->userOficios as $oficio2)
                                @if($oficio2->oficio->id == $oficio->id)
                                    selected
                                @endif
                            @endforeach
                        >
                            {{$oficio->nombre}}
                        </option>
                    @endforeach
                </select>
                @error('oficios')
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            {{ $message }}
                        </div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary"> Actualizar Datos </button>

        </form>

    </div>


@endsection
