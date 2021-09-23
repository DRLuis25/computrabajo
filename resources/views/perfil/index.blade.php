@extends('welcome')
@section('content')
    
    <div style="margin: 0px 350px 800px 350px">

        <div style="text-align: right">
            <a href="{{route('perfilPassword.edit', Auth::user()->id)}}" class="btn btn-warning">CAMBIAR CONTRASEÑA</a>
            <a href="{{route('perfilUsuario.edit', Auth::user()->id)}}" class="btn btn-success">EDITAR PERFIL</a>
        </div>

        <br>
        <h1 style="text-align: center">Mi Perfil</h1>
        <div style="float: left; width:300px">
            <img src="{{ asset('images/user.jpg') }}" alt="Imagen no encontrada." style="width: 200px">
            <br>
            <br>
            <h5>Documento (Dni): </h5>
            <input class="form-control" type="text" value="{{$usuario->dni}}" readonly>
            <br>

            <h5>Nombres: </h5>
            <input class="form-control" type="text" value="{{$usuario->name}}" readonly>
    
            <br>
            <h5>Apellidos: </h5>
            <input class="form-control" type="text" value="{{$usuario->apellidos}}" readonly>
            <br>

            <h5>Correo Electrónico: </h5>
            <input class="form-control" type="text" value="{{$usuario->email}}" readonly>
            <br>
        </div>

        <div style="float: right; width:300px">
            <br>
            <h5>Fecha de Nacimiento: </h5>
            <input class="form-control" type="text" value="{{$usuario->fecha_nacimiento->format('d-m-Y')}}" readonly>

            <br>
            <h5>Acerca de mí: </h5>
            <textarea class="form-control" style="resize:none;" readonly rows="5">{{$usuario->acerca_de_mi }}</textarea>

            <br>
            <h5>Experiencia: </h5>
            <textarea class="form-control" style="resize:none;" readonly rows="5">{{$usuario->experiencia }}</textarea>

            <br>
            <h5>Oficios: </h5>
            @if (count($usuario->userOficios)>0)

                <select multiple class="form-control" id="oficios" readonly>
                    @foreach ($usuario->userOficios as $oficio)
                        <option value={{$oficio->oficio->id}}>
                            {{$oficio->oficio->nombre}}
                        </option>
                    @endforeach
                </select>
                
            @else
                No existen oficios registrados.
            @endif
            
        </div>
    </div>     
@endsection
