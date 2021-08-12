@extends('welcome')

@section('content')
    <div class="navegacionBotones">
        <button type="button" class="btn btn-primary">Detalles</button>
        <button type="button" class="btn btn-warning">Propuestas</button>
    </div>
    <h4 class="tupropuesta">Tu propuesta</h4>
    <div class="D_CajaPadre">
        <section class="D_Izquierda">
            <div class="caja1">
                <i class="fa fa-user"></i>
                <span class="spanizq">{{ auth()->user()->name }}</span>
                <span class="spanizq">{{ auth()->user()->email }}</span>
                <span class="soles"> {{ $monto }} soles</span>
            </div>
            <div class="caja2">
                <span class="calificacion">
                    <?php
                    $num = auth()->user()->calificacion_colaborador;
                    if ($num == 0) {
                        echo '<i class="fa fa-star" ></i>
                                                                                          <i class="fa fa-star" ></i>
                                                                                          <i class="fa fa-star" ></i>
                                                                                          <i class="fa fa-star" ></i>
                                                                                          <i class="fa fa-star" ></i>';
                    }
                    if ($num == 1) {
                        echo '<i class="fa fa-star" style="color: orange" ></i>
                                                                                          <i class="fa fa-star" ></i>
                                                                                          <i class="fa fa-star" ></i>
                                                                                          <i class="fa fa-star" ></i>
                                                                                          <i class="fa fa-star" ></i>';
                    }
                    if ($num == 2) {
                        echo '<i class="fa fa-star"  style="color: orange" ></i>
                                                                                          <i class="fa fa-star"  style="color: orange"  ></i>
                                                                                          <i class="fa fa-star"  ></i>
                                                                                          <i class="fa fa-star"  ></i>
                                                                                          <i class="fa fa-star"  ></i>';
                    }
                    if ($num == 3) {
                        echo '<i class="fa fa-star"  style="color: orange" ></i>
                                                                                          <i class="fa fa-star"  style="color: orange"  ></i>
                                                                                          <i class="fa fa-star"  style="color: orange" ></i>
                                                                                          <i class="fa fa-star"  ></i>
                                                                                          <i class="fa fa-star"  ></i>';
                    }
                    if ($num == 4) {
                        echo '<i class="fa fa-star" style="color: orange" ></i>
                                                                                          <i class="fa fa-star" style="color: orange"  ></i>
                                                                                          <i class="fa fa-star" style="color: orange" ></i>
                                                                                          <i class="fa fa-star" style="color: orange" ></i>
                                                                                          <i class="fa fa-star" ></i>';
                    }
                    if ($num == 5) {
                        echo '<i class="fa fa-star" style="color: orange" ></i>
                                                                                          <i class="fa fa-star" style="color: orange"  ></i>
                                                                                          <i class="fa fa-star" style="color: orange" ></i>
                                                                                          <i class="fa fa-star" style="color: orange" ></i>
                                                                                          <i class="fa fa-star" style="color: orange" ></i>';
                    }
                    ?>
                </span>
                <span class="dias"> {{ $tiem }} dias</span> <br>
            </div>
            <span>{{ $desc }}</span>
            <div class="D_botones">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>
                <a type="button" class="btn btn-success" href="{{route('contactarEmpleador.edit',$ultimo->id)}}" >Editar</a>
            </div>

            <!-- Modal -->
            <form method="Post" action="{{route("contactarEmpleador.destroy",$ultimo->id)}}">
                @method('delete')
                @csrf
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Eliminar Postulación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Seguro que desea eliminar su postulación?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success">Aceptar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>

        <aside class="D_Derecha">
            <div>
                <h6>Presupuesto</h6> 
                <span>S/. {{$presupuesto->pago_propuesto_min}} - {{$presupuesto->pago_propuesto_max}} PEN</span>
            </div>
            <div>
                <h6>Postulantes</h6>
                <span>{{$total_postulantes}}</span>
            </div>
            <div>
                <h6>Oferta media</h6>
                <span>{{$promedio}}</span>
            </div>
        </aside>
    </div><br>
    <h4 class="tupropuesta">Otras propuestas</h4>
    @foreach ($datos_otros_usuarios_postulantes as $item)
        <div class="D_CajaPadre">

            <section class="D_Izquierda">
                <div class="caja1">
                    <i class="fa fa-user"></i>
                    <span class="spanizq">{{ $item->name }}</span>
                    <span class="spanizq">{{ $item->email }}</span>
                    <span class="soles"> {{ $item->importe }} soles</span>
                </div>
                <div class="caja2">
                    <span class="calificacion">
                        <?php $num = $item->calificacion_colaborador;
                        if ($num == 0) {
                            echo '<i class="fa fa-star" ></i>
                                                                                                      <i class="fa fa-star" ></i>
                                                                                                      <i class="fa fa-star" ></i>
                                                                                                      <i class="fa fa-star" ></i>
                                                                                                      <i class="fa fa-star" ></i>';
                        }
                        if ($num == 1) {
                            echo '<i class="fa fa-star"  style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star" ></i>
                                                                                                                  <i class="fa fa-star" ></i>
                                                                                                                  <i class="fa fa-star" ></i>
                                                                                                                  <i class="fa fa-star" ></i>';
                        }
                        if ($num == 2) {
                            echo '<i class="fa fa-star"  style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star"  style="color: orange"  ></i>
                                                                                                                  <i class="fa fa-star" ></i>
                                                                                                                  <i class="fa fa-star" ></i>
                                                                                                                  <i class="fa fa-star" ></i>';
                        }
                        if ($num == 3) {
                            echo '<i class="fa fa-star"  style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star"  style="color: orange"  ></i>
                                                                                                                  <i class="fa fa-star"  style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star"  ></i>
                                                                                                                  <i class="fa fa-star"  ></i>';
                        }
                        if ($num == 4) {
                            echo '<i class="fa fa-star" id="1estrella" style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star" style="color: orange"  ></i>
                                                                                                                  <i class="fa fa-star" style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star" style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star" ></i>';
                        }
                        if ($num == 5) {
                            echo '<i class="fa fa-star" style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star" style="color: orange"  ></i>
                                                                                                                  <i class="fa fa-star" style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star" style="color: orange" ></i>
                                                                                                                  <i class="fa fa-star" style="color: orange" ></i>';
                        }
                        ?>
                    </span>
                    <span class="dias"> {{ $item->tiempo }} dias</span>
                    <br><br>
                </div>
                <span>{{ $item->descripcion }}</span>

            </section>
        </div><br>
    @endforeach


@endsection
