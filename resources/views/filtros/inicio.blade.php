@extends('welcome')
@section('content')


    <form>
        <div class="buscador">
            <div class="input-group">
                <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="submit" class="btn btn-primary">Buscar Empleos</button>
            </div> <br>
            <h6>
                 @if (isset($search))
                 @if ($search)
                 <div class="alert alert-primary" role="alert">
                    Los resultados para tu busqueda '{{ $search }}' son :
                </div>
                 @endif
                @endif 
            </h6>
        </div>
    </form>
    @if (\Session::has('success'))
        <div class="alert alert-danger">
            <ul>
                <h4>{!! \Session::get('success') !!}</h4>
            </ul>
        </div>
    @endif
    <div class="M_diseño">

        <section class="M_section">
            <h4><b>Información</b></h4> <br>
            
            <div class="M_rango">
                <div>
                    <h5><b>Empleos</b></h5>
                    <ul>
                      <li>Postula seguro</li>
                      <li>Pagos diarios</li>
                      <li>Pagos en efectivo</li>
                      <li>Pagos mediante app (yape,tunki). </li>
                      <li>Trabajos a tu medida</li>
                     
                        
                    </ul>
                </div>
                <div>
                    <h5><b>Recomendaciones</b></h5>
                    <span>Postule al trabajo que mejor se adecue a sus preferencias y habilidades,sea respetuoso, recuerde que esta sujeto a una calificación.</span>
                </div>
            </div>
        </section>

        <aside class="M_aside">
            <form class="seleccionando">
                <article class="mejores_resultados">
                    <span>Mejores Resultados</span>
                    <label>ordenar por
                        <select class="M_select form-select-sm " name="select" aria-label="Default select example" onchange="this.form.submit()">
                            <option selected value="el">Más reciente</option>
                            <option value="antiguo" <?php if (isset($select)){if($select=="antiguo"){echo "selected='selected'";} }?>>Más antiguo</option>
                            <option value="pbajo" <?php if (isset($select)){if($select=="pbajo"){echo "selected='selected'";} }?>>El precio más bajo</option>
                            <option value="palto" <?php if (isset($select)){if($select=="palto"){echo "selected='selected'";} }?>>El precio más alto</option>
                        </select>
                    </label>
                </article>
            </form>
            @foreach ($anuncios as $item)

                <a href="{{ route('contactarEmpleador.index', ['ide' => $item->id]) }}" class="M_link"
                    id="M_link">
                    <article class="resultados">
                        <div class="M_caja1">
                            <span class="titulo">{{ $item->titulo }}</span>
                            <span>{{ $item->pago_propuesto_min . ' - ' . $item->pago_propuesto_max . ' ' }}soles</span>
                            <span class="M_hace">
                                publicado hace
                                <?php
                                date_default_timezone_set('America/Lima');
                                $fecha_actual = date('d-m-Y H:i:s');
                                $fecha_publica = date_format($item->created_at, 'Y-m-d H:i:s');
                                $start_date = new DateTime($fecha_publica);
                                $since_start = $start_date->diff(new DateTime($fecha_actual));
                                if ($since_start->s != 0 && $since_start->i == 0 && $since_start->h == 0 && $since_start->d == 0 && $since_start->m == 0 && $since_start->y == 0) {
                                    echo $since_start->s . ' segundos';
                                } elseif ($since_start->i != 0 && $since_start->h == 0 && $since_start->d == 0 && $since_start->m == 0 && $since_start->y == 0) {
                                    echo $since_start->i . ' minutos';
                                } elseif ($since_start->h != 0 && $since_start->d == 0 && $since_start->m == 0 && $since_start->y == 0) {
                                    echo $since_start->h . ' horas';
                                } elseif ($since_start->d != 0 && $since_start->m == 0 && $since_start->y == 0) {
                                    echo $since_start->d . ' dias';
                                } elseif ($since_start->m != 0 && $since_start->y == 0) {
                                    echo $since_start->m . ' meses';
                                } elseif ($since_start->y != 0) {
                                    echo $since_start->y . ' años';
                                }
                                
                                ?>
                            </span>
                        </div>
                        <div class="M_caja2">
                            <span>{{ $item->descripcion }}</span>
                        </div>
                        <div class="M_caja3">
                            <span style="margin-left: 2vw">Precio Fijo</span>
                            <span class="fa fa-user">
                                <?php $num = $item->calificacion_empleador;
                                if ($num == 0) {
                                    echo '<i class="fa fa-star" ></i>
                                                                                                                                                                                                                                                                                                                                                                                                                          <i class="fa fa-star" ></i>
                                                                                                                                                                                                                                                                                                                                                                                                                          <i class="fa fa-star" ></i>
                                                                                                                                                                                                                                                                                                                                                                                                                          <i class="fa fa-star" ></i>
                                                                                                                                                                                                                                                                                                                                                                                                                          <i class="fa fa-star" ></i>';
                                }
                                if ($num == 1) {
                                    echo '<i class="fa fa-star" id="1estrella" style="color: orange" ></i>
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
                                    echo '<i class="fa fa-star" id="1estrella" style="color: orange" ></i>
                                                                                                                                                                                                                                                                                                                                                                          <i class="fa fa-star" id="2estrella"  style="color: orange"  ></i>
                                                                                                                                                                                                                                                                                                                                                                          <i class="fa fa-star" id="3estrella"  style="color: orange" ></i>
                                                                                                                                                                                                                                                                                                                                                                          <i class="fa fa-star" id="4estrella" ></i>
                                                                                                                                                                                                                                                                                                                                                                          <i class="fa fa-star" id="5estrella" ></i>';
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
                        </div>

                    </article>
                </a>
            @endforeach
            <div class="card-footer  py-3 bg-white border-top-0 ">
                <nav aria-label="...">
                    <ul class="pagination justify-content-end mb-0">
                        {{ $anuncios->links() }}
                    </ul>
                </nav>
            </div>
        </aside>

    </div>


    <script>
        window.addEventListener("load", function() {
            document.getElementById('text-end').style.display = 'none';
            //  $('#myModal').modal('show');

        });
        /* 
        var yapostulo = document.querySelector(".M_link");

        yapostulo.addEventListener("click",e=>{
            e.preventDefault()
            Swal.fire({
                    icon: 'warning',
                    title: 'Ya postulo a este trabajo',
                    text: 'Por favor llene todos los campos!'
                })
               
        }) */
    </script>

@endsection
