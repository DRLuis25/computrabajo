@extends('welcome')
@section('content')

    <div style="margin-left: 300px; margin-right: 300px">
        <h1 style="text-align: center">Cambiar Contraseña</h1>

        <div>
            <form method="POST" action="{{route('perfilPassword.update',$usuario->id)}}">
            @method('PUT')
            @csrf
            @if (session('datos'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('datos')}}
            </div>
            @endif
                <br>
                <div class="form-group">
                    <label for="password1">Contraseña Actual</label>
                    <input type="password" class="form-control @error('password1') is-invalid @enderror" id="password1" name="password1"  placeholder="Ingrese Contraseña" >
                    @error('password1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                <label for="password2">Nueva Contraseña</label>
                <input type="password" class="form-control @error('password2') is-invalid @enderror" id="password2" name="password2"  placeholder="Ingrese nueva contraseña" >
                @error('password2')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="password3">Repetir Nueva Contraseña</label>
                <input type="password" class="form-control @error('password3') is-invalid @enderror" id="password3" name="password3"  placeholder="Repetir Contraseña">
                @error('password3')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
            </form>
        </div>
    </div>


@endsection