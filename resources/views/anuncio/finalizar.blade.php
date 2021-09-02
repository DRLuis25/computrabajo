@extends('layouts.app')
@section('content')
@include('anuncio.header')
<div class="sections">
    <div class="container">
        <div class="card">
            <div class="card-body m-3">
              <h5 class="card-title">Detalle Anuncio</h5>
              <p class="card-text"><h3>{{$anuncio->titulo}}</h3></p>
                <h5>Descripción del anuncio</h5>
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="">
                                                <p style="margin: 0;
                                                text-align: justify;">
                                                    {{$anuncio->descripcion}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="container">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Ubicación</th>
                                                            <td>{{$anuncio->ciudad->nombre}}, {{$anuncio->departamento->nombre}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Fecha publicación</th>
                                                            <td>{{$anuncio->created_at->diffForHumans()}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Estado</th>
                                                            <td>{{$anuncio->estado_anuncio}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div >
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        data-bs-whatever="@mdo">
                                        Finalizar anuncio
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End row -->
                <h5>Colaboradores</h5>
                <div class="container row">
                    @foreach ($anuncio->userAnuncios as $item)
                    <div class="card col-3 text-center">
                        <img class="card-img-top" src="https://freepikpsd.com/media/2019/10/default-user-profile-image-png-6-Transparent-Images.png" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->user->full_name}}</h5>
                            <p class="card-text" style="margin: 0; text-align: justify;">
                                {{$item->user->acerca_de_mi}}
                            </p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="form-group">
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        &nbsp;
                                        <label for="">{{$anuncio->detalleAnuncios[0]->user->detalleAnuncios->count()}} @if ($anuncio->detalleAnuncios[0]->user->detalleAnuncios->count() == 1)
                                            evaluación
                                            @else
                                            evaluaciones
                                        @endif</label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <a href="" class="btn btn-secondary">Perfil</a>
                                </li>
                            </ul>
                        </div>
                    @endforeach
                </div><!-- End row -->
            </div>
        </div>
    </div>
</div><!-- End sections -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Finalizar Anuncio?</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="finalizarAnuncio-form" method="POST" action="{{route('anuncio.valoracion')}}">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <input type="text" name="anuncio_id" id="anuncio_id" value="{{$anuncio->id}}" hidden>
                    <label for="recipient-name" class="col-form-label">
                        Al finalizar este anuncio, se notificará al Empleador que no se requiere más trabajo
                        para este anuncio.
                    </label>
                </div>
                <p>¿Cuáles son los términos para finalizar este anuncio?</p>
                <div class="form-check form-check-inline">
                    <label class="checkbox-inline">
                        <input type="radio" id="si" name="termino" value="1" required> Estoy satisfecho, se han cumplido todos los requisitos de mi anuncio.
                    </label>
                    <label class="checkbox-inline">
                        <input type="radio" id="no" name="termino" value="0"> El Empleador no puede completar mi anuncio.
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <input type="submit" name="" id="" class="btn btn-primary">
            </div>
        </form>
    </div>
  </div>
</div>
@push('scripts')
    <script>
        $(function () {
            $('#finalizarAnuncio-form').on('submit', function(e){
            //e.preventDefault();
            console.log($('#finalizarAnuncio-form').serialize());
                /* $.ajax({
                    url: '{{route('anuncio.final')}}', //this is the submit URL
                    type: 'POST', //or POST
                    headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}',
                    },
                    data: $('#createProcess-form').serialize(),
                    success: function(data){
                        if(data.status==200){
                            console.log(data);
                            alert('Registrado correctamente');
                            $('#createProcess-form').trigger('reset');
                            $('#processModal').modal('toggle');
                            $('.data-table-process').DataTable().ajax.reload();
                            console.log("reload");
                            //replaceDiagram(); Update Mapa proceso
                        }
                        else if (data.status==500) {
                            console.log(data.e);
                            alert("Error al registrar. Registro duplicado");
                        }

                    },
                }); */
            });
        })

        var exampleModal = document.getElementById('exampleModal')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipient = button.getAttribute('data-bs-whatever')
            var modalTitle = exampleModal.querySelector('.modal-title')
            var modalBodyInput = exampleModal.querySelector('.modal-body input')

            modalTitle.textContent = '¿Finalizar Anuncio?'// + recipient
            //modalBodyInput.value = recipient
        })

    </script>

  @endpush


@endsection
