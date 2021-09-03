@extends('layouts.admin.app')

@section('content')


    @section('css')
    <!-- -Link estilos max->

    @endsection


        <form>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombres</label>
            <input type="text" value="{{$duser->name}}" class="form-control" id="name" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
            <input type="text" value="{{$duser->apellidos}}" class="form-control" id="apellidos" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Direccion</label>
            <input type="text" value="{{$duser->direccion}}" class="form-control" id="direccion" aria-describedby="emailHelp">
            </div>


        </form>

        <div class="card" >
                <h5>HISTORIAL DEL USUARIO</h5>
                <a href="{{route('admin.historial',$duser->id)}}" ><button type="button" class="btn btn-primary">EMPLEADOR</button></a>

                <a ><button type="button" class="btn btn-primary"> COLABORADOR</button></a>

            <div class="card-body" >
                    <table class="table" id="datosusuarios">
                        <thead class="thead-dark">
                        <tr>

                            <th scope="col">Publicacion</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Oficio</th>
                            <th scope="col">Decripcion</th>
                            <th scope="col">Ciudad</th>
                            <th scope="col">Colaborador</th>
                            <th scope="col">Estado</th>

                        </tr>
                        </thead>

                        <tbody>
                            @foreach ($anunciouser as $anuncio)
                            <tr>
                                <td>{{$anuncio->created_at}}</td>
                                <td>{{$anuncio->titulo}}</td>
                                <td>{{$anuncio->oficio}}</td>
                                <td>{{$anuncio->descripcion}}</td>
                                <td>{{$anuncio->ciudad}}</td>
                                <td>{{$anuncio->email}}</td>
                                <td>{{$anuncio->estado==0? 'ACTIVO':$anuncio->estado==1?'EN PROCESO':'FINALIZADO'}}</td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

            </div>
        </div>


        </div>

        @section('js')

        @endsection




@endsection
