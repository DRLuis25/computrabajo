@extends('layouts.admin.app')

@section('content')


    @section('css')
    <!-- -Link estilos max->

    @endsection

    <h5 style="margin-left:42%">DATOS DEL USUARIOS</h5>

        <div class="card" >

            <div class="card-body">
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
                    <label for="exampleInputEmail1" class="form-label">Dirección</label>
                    <input type="text" value="{{$duser->direccion}}" class="form-control" id="direccion" aria-describedby="emailHelp" disabled>
                    </div>

                </form>
            </div>


        </div>
        <h5 style="margin-left:41%">HISTORIAL DEL USUARIO</h5>
        <div class="card" >

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin:20px">
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

                        <table class="table tabla1"  id="tabla1" class="table datosusuarios ">
                            <thead class="thead-dark">
                            <tr>

                                <th scope="col">Publicación</th>
                                <th scope="col">Título</th>
                                <th scope="col">Oficio</th>
                                <th scope="col">Decripción</th>
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
                        <table class="table tabla2"  id="tabla2" id="datosusuarios1" class="table datosusuarios1">
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

            </div>


@endsection

@section('js')
    <script>



        $(document).ready(function() {
            $('.tabla1').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'pageLength',
                        {
                            extend: 'excelHtml5',
                            title: '',
                            exportOptions: {
                                columns: function (idx, data, node) {
                                    if (node.innerHTML == "Accion" || node.hidden)
                                        return false;
                                    return true;
                                }
                            }
                        },

                        {
                            extend: 'pdfHtml5',
                            title: '',
                            exportOptions: {
                                columns: function (idx, data, node) {
                                    if (node.innerHTML == "Accion" || node.hidden)
                                        return false;
                                    return true;
                                }
                            }
                        }

                    ]
                }
            );
        } );



        $(document).ready(function() {
            $('.tabla2').DataTable(
                {
                    dom: 'Bfrtip',
                    buttons: [
                        'pageLength',
                        {
                            extend: 'excelHtml5',
                            title: '',
                            exportOptions: {
                                columns: function (idx, data, node) {
                                    if (node.innerHTML == "Accion" || node.hidden)
                                        return false;
                                    return true;
                                }
                            }
                        },

                        {
                            extend: 'pdfHtml5',
                            title: '',
                            exportOptions: {
                                columns: function (idx, data, node) {
                                    if (node.innerHTML == "Accion" || node.hidden)
                                        return false;
                                    return true;
                                }
                            }
                        }

                    ]
                }
            );
        } );
    </script>


@endsection

