@extends('welcome')
@section('content')
<form  >
    <div class="buscador">
        <div class="input-group">
            <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                aria-describedby="search-addon" />
            <button type="submit" class="btn btn-primary">Buscar Empleos</button>
        </div> <br>
        <h6>
            @if ($search)
            <div class="alert alert-primary" role="alert">
                Los resultados para tu busqueda '{{$search}}' son : 
            </div>
            @endif   
        </h6>
    </div>
</form>

    <div class="M_diseño">
        <section class="M_section">
            <h4>Filtros</h4> <br>
            <h5>Rango de Precios</h5>
            <div class="M_rango">
                <div>
                    <p>minimo</p>
                    <div class="input-group">
                        <span class="input-group-addon">S/.</span>
                        <input type="text" class="form-control" name="importe">
                    </div>
                </div>
                <div>
                    <p>maximo</p>
                    <div class="input-group">
                        <span class="input-group-addon">S/.</span>
                        <input type="text" class="form-control" name="importe">
                    </div>
                </div>
            </div>


        </section>

        <aside class="M_aside">

            <article class="mejores_resultados">
                <span>Mejores Resultados</span>
                <label>ordenar por
                    <select class="M_select form-select-sm " aria-label="Default select example">
                        <option selected>Más reciente</option>
                        <option value="1">Más antiguo</option>
                        <option value="2">El precio más bajo</option>
                        <option value="3">El precio más alto</option>
                    </select>
                </label>
            </article>
            @foreach ($anuncios as $item)
                <a href="{{route('contactarEmpleador.index',['ide'=>$item->id])}}" class="M_link">
                    <article class="resultados">
                        <div class="M_caja1">
                            <span class="titulo">{{ $item->titulo }}</span>
                            <span>{{ $item->pago_propuesto_min . ' - ' . $item->pago_propuesto_max . ' ' }}soles</span>
                            <span class="M_hace">publicado hace 2 minutos</span>
                        </div>
                        <div class="M_caja2">
                            <span>{{ $item->descripcion }}</span>
                        </div>
                        <div class="M_caja3">
                            <span style="margin-left: 2vw">Precio Fijo</span>
                            <span class="fa fa-user">
                                <?php $num = $item->calificacion_empleador;
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
        </aside>
    </div>

@endsection
