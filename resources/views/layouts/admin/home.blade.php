@extends('layouts.admin.app')

@section('content')

    <h5>Usuarios registrados</h5>
    <div class="card">
        <div class="card-body">
            <table class="table tabla" id="tabla" style="text-align: center" >
                <thead class="thead-dark">
                <tr>

                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Celular</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Calificación</th>
                    <th scope="col">Acción</th>

                </tr>
                </thead>

                <tbody >
                    @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->name}}</td>
                        <td>{{$usuario->apellidos}}</td>
                        <td>{{$usuario->direccion}}</td>
                        <td>{{$usuario->celular}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->calificacion_empleador}}</td>
                        <td> <a href="{{route('admin.historial',['id' => $usuario->id])}}" type="button" ><i class="fas fa-eye"></i></a>
                            <a href="{{route('admin.editar',['id' => $usuario->id])}}" type="button" ><i class="fas fa-edit" style="color:black;"></i></a>
                            <!-- Button trigger modal -->
                            <a type="button" data-toggle="modal" data-target="#exampleModal" data-userid="{{$usuario->id}}" ><i class="fas fa-trash-alt " style="color: red;"></i></a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>



    </div>
</div>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <form method="POST" action="">
            @method('post')
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR USUARIO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        ¿Quieres eliminar este usuario?

      </div>
      <div class="modal-footer">
        <a class="btn btn-danger" onclick="$(this).closest('form').submit();" style="color: rgb(248, 231, 231);">Eliminar</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>

      </div>
    </form>
    </div>
  </div>
</div>




@endsection

@section('js')
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var post_id = button.data('userid')

            var modal = $(this)
            modal.find('.modal-footer #post_id').val(post_id);
            modal.find('form').attr('action','/admin/usuarios/' + post_id);
        })


        $(document).ready(function() {
            $('.tabla').DataTable(
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

