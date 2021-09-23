@extends('welcome')

@section('content')
    <div class="navegacionBotones">
        {{-- <button type="button" class="btn btn-primary">Detalles</button> --}}
        <button type="button" class="btn btn-warning">Propuestas</button>
    </div>
    <div class="d-flex justify-content-center">
        <h3 class="text-center">Bienvenido {{ auth()->user()->name }} </h3>
    </div>
    <h4 class="tupropuesta">Tus Propuestas</h4>
    <form>
        <br>
        <div class="buscador">
            <div class="input-group">
                <input type="search" class="form-control rounded" name="search" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" />
                <button type="submit" class="btn btn-primary">Buscar detalles</button>
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
    @foreach ($postulaAnuncio as $item)
    <div class="container border">
        <div>
            <div class="d-flex align-items-stretch">
                <div class="col-1 mt-3 ms-3">
                    <b>{{$item->anuncio->titulo}}</b> 
                </div>
                <div class="col-2 ms-5">
                    
                        <b style="color: red;">Detalles del Anunciante</b>
                        <br>
                        <?php
                                $nombre = $item->anuncio->user->name;
                                $mi = $item->anuncio->user->created_at;
                                $miembro = strstr($mi, ' ', true);
                                $user = strstr($nombre, ' ', true);
                                ?>
                            <span> <i class="fa fa-user"></i>&nbsp;{{ $user }}
                                {{ $item->anuncio->user->apellidos }}</span><br>
                            <span> <i class="fa fa-check"> </i>&nbsp;</i><?php $num = $item->anuncio->user->calificacion_empleador;
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
                                    </span><br>
                            <span><i class="fa fa-map-marker"></i>&nbsp; {{ $item->anuncio->user->direccion }}</span><br>
                            <span><i class="fa fa-clock-o"></i>&nbsp;Miembro desde {{ $miembro }}</span>
                        
                    
                </div>

                <div class="col-1"></div>
                <div class="col-4">
                    <div class="mt-3">
                        <b>Detalle postulación:</b> <br>
                        {{$item->descripcion}} 
                    </div>
                </div>
                <div class="col-3">
                    <br>
                    <div class="align-self-center">
                        <div>
                            <p>S/. {{$item->importe}} -- Dias: {{$item->tiempo}}</p>
                            <p>Postulación: {{$item->updated_at}}</p>
                            <div>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>
                                <a type="button" class="btn btn-success" href="{{route('contactarEmpleador.edit',$item->id)}}" >Editar</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <!-- Modal -->
    <form method="Post" action="{{route("contactarEmpleador.destroy",$item->id)}}">
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

    @endforeach

    <div class="card-footer  py-3 bg-white border-top-0 ">
        <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
                {{ $postulaAnuncio->links() }}
            </ul>
        </nav>
    </div>
        
    </div><br>
    



@endsection
