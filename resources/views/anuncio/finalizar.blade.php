@extends('layouts.app')
@section('content')
<div class="sections">
    <div class="container">
        <div class="sections-title">
            <div class="sections-title-h3"><h3>Mis Anuncios</h3></div>
        </div><!-- End sections-title -->
        <div class="row">
            <div class="sections sections-padding-0">
                <div class="container">
                    <div class="callout callout-4">
                        <h6>Nombre anuncio</h6>
                        <div class="row">
                            <div class="col-md-10">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.</p>
                                <br>
                                <div class="">
                                    <div class="form-group col-sm-2">
                                        <p>Trujillo, La Libertad</p>
                                    </div>
                                    <div class="form-group col-sm-2">
                                        <p>Hace 4 días</p>
                                    </div>
                                    <div class="">
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                        <label for="">30 evaluaciones</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="callout-a ">
                                    {{-- <button type="button" class="button-3"
                                        data-toggle="modal" data-target="#processModal"
                                        data-whatever="Registrar">
                                        Finalizar
                                    </button> --}}
                                    <div class="callout-a "><a class="button-3" href="{{route('anuncio.valoracion')}}">Finalizar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End callout -->
                    <div class="gap"></div>
                </div><!-- End container -->
            </div><!-- End sections -->
        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End sections -->

{{--
<div class="modal fade" id="processModal" tabindex="-1" role="dialog" aria-labelledby="processModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="processModalLabel">New message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" id="createProcess-form">
                <div class="row">
                    <div class="form-group col-6">
                        <label for="name" class="col-form-label">@lang('models/processes.fields.name'):</label>
                        <input type="text" id="name" name="name" required class="form-control">
                    </div>
                    <div class="form-group col-12">
                        <label for="description" class="col-form-label">@lang('models/processes.fields.description'):</label>
                        <input type="text" class="form-control" name="description" id="description" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <input type="submit" value="Guardar" class="btn btn-primary" id="checkBtn">
                </div>
            </form>
        </div>
      </div>
    </div>
  </div> --}}
@push('scripts')
    <script>
        $('#processModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var modal = $(this)
            //modal.find('.modal-title').text(recipient + ' proceso processMapId:')
        });
        $('#createProcess-form').on('submit', function(e){
            e.preventDefault();
            checked = $("input[type=checkbox]:checked").length;

            if(!checked) {
                alert("Debes marcar al menos un tipo de proceso.");
                return false;
            }
            console.log($('#createProcess-form').serialize());
            $.ajax({
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
            });
        });
    </script>

  @endpush


@endsection
