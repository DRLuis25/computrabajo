@extends('layouts.admin.app')

@section('content')


    @section('css')
    <!-- -Link estilos max->

    @endsection


        <form class="row">
            <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label" >Nombres</label>
            <input type="text" value="{{$duser->name}}" class="form-control" id="name" aria-describedby="emailHelp" disabled>
            </div>

            <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
            <input type="text" value="{{$duser->apellidos}}" class="form-control" id="apellidos" aria-describedby="emailHelp" disabled>
            </div>

            <div class="mb-3 col-6">
            <label for="exampleInputEmail1" class="form-label">Direccion</label>
            <input type="text" value="{{$duser->direccion}}" class="form-control" id="direccion" aria-describedby="emailHelp" disabled>
            </div>

        </form>

        <div class="card" >
                <h5>HISTORIAL DEL USUARIO</h5>

                {{-- <a><button type="button" class="btn btn-primary">EMPLEADOR</button></a>

                <a href="{{route('admin.chistorial',$duser->id)}}" ><button type="button" class="btn btn-primary"> COLABORADOR</button></a> --}}



            </div>


            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">EMPLEADOR</a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">COLABORADOR</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="card-body" >

                        <table class="table" id="datosusuarios" class="table datosusuarios">
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
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body" >
                        <table class="table" id="datosusuarios1" class="table datosusuarios1">
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
                                @foreach ($anunciouser1 as $anuncio1)
                                <tr>
                                    <td>{{$anuncio1->created_at}}</td>
                                    <td>{{$anuncio1->titulo}}</td>
                                    <td>{{$anuncio1->oficio}}</td>
                                    <td>{{$anuncio1->descripcion}}</td>
                                    <td>{{$anuncio1->ciudad}}</td>
                                    <td>{{$anuncio1->email}}</td>
                                    <td>{{$anuncio1->estado==0? 'ACTIVO':$anuncio1->estado==1?'EN PROCESO':'FINALIZADO'}}</td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>

                </div>
                </div>

              </div>




@endsection

