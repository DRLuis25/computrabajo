@extends('welcome')
@section('content')
    
    <div style="margin-left: 350px; margin-right: 350px">

        {{-- <a href="perfilUsuario.edit" class="btn btn-success" style="float: right">EDITAR PERFIL</a> --}}

        <h1 style="text-align: center">Datos del Perfil</h1>


        <div style="float: left">
            <img src="{{ asset('images/user.jpg') }}" alt="Foto no encontrada." style="width: 200px">
            <br>
            <br>
            <h5>Nombres: </h5>
            <p>{{ Auth::user()->name }}</p>
    
            <br>
            <h5>Apellidos: </h5>
            <p>{{ Auth::user()->apellidos }}</p>
    
            <br>
            <h5>Correo Electrónico: </h5>
            <p>{{ Auth::user()->email }}</p>
        </div>

        <div style="float: right">
            <br>
            <h5>Acerca de mí: </h5>
            <p>{{ Auth::user()->acerca_de_mi }}</p>

            <br>
            <h5>Experiencia: </h5>
            <p>{{ Auth::user()->experiencia }}</p>

        </div>

       
        
    </div>


@endsection
