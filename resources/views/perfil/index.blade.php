@extends('welcome')
@section('content')
    
    <div style="margin-left: 200px; margin-right: 200px">

        <a href="perfilUsuario.edit" class="btn btn-success" style="float: right">EDITAR PERFIL</a>

        <h1 style="text-align: center">Mi Perfil</h1>


        <img src="" alt="">
        <p>{{ Auth::user()->name }}</p>

        

    </div>


@endsection
