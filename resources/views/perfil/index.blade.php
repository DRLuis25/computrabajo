@extends('welcome')
@section('content')
    
    <div style="margin-left: 350px; margin-right: 350px">

        <a href="{{route('perfilUsuario.edit', Auth::user()->id)}}" class="btn btn-success" style="float: right">EDITAR PERFIL</a>

        <h1 style="text-align: center">Mi Perfil</h1>


        <div style="float: left">
            <img src="{{ asset('images/user.jpg') }}" alt="Foto no encontrada." style="width: 200px">
            <br>
            <br>
            <h5>Nombres: </h5>
            <input class="form-control" type="text" value="{{$usuario->name}}" disabled>
    
            <br>
            <h5>Apellidos: </h5>
            <input class="form-control" type="text" value="{{$usuario->apellidos}}" readonly>
    
            <br>
            <h5>Correo Electrónico: </h5>
            <input class="form-control" type="text" value="{{$usuario->email }}" readonly>
            <br>
        </div>


        <div style="float: right; width:300px">
            <br>
            <h5>Fecha de Nacimiento: </h5>
            <input class="form-control" type="text" value={{$usuario->fecha_nacimiento}} readonly>

            <br>
            <h5>Acerca de mí: </h5>
            <textarea class="form-control" style="resize:none;" readonly rows="5">{{$usuario->acerca_de_mi }}</textarea>
            {{-- <input class="form-control" type="textarea" value="{{$usuario->acerca_de_mi }}" readonly> --}}

            <br>
            <h5>Experiencia: </h5>
            <input class="form-control" type="text" value="{{$usuario->experiencia }}" readonly>
        </div>
        
       
        
    </div>


@endsection
