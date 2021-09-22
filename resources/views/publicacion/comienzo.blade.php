@extends('layouts.app')
@section('content')

<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <div class="text-end">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="" class="nav-link px-2 text-secondary">Propuesta</a></li>
                    <li><a href="" class="nav-link px-2 text-secondary">Contratado</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>

<div class="row">
<div class="col-md-8 col-sm-8 "  style="margin:2% 2% 6% 5%">
    <div>
        <h3 class="card-title">Contratados</h3>
    </div>
    @foreach ($temporal as $item)
        
    
    <div class="container border">
        <div>
            <div class="d-flex align-items-stretch">
                <div class="col-1">
                    <br><br>
                    <img src="{{ asset('images/user.jpg') }}" alt="Imagen no encontrada." style="width: 100px">
                </div>
                <div class="col-1"></div>
                <div class="col-2">
                    <br>  
                    <p>{{$item->user->name}} </p>
                    <br>
                    <p>Completado en {{$item->dia}} días</p>
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                    <br>
                    <p>{{$item->descripcion}}</p>
                    
                    <p>Desde {{$item->anuncio->ciudad->nombre}}</p>
                    <div class="button-group mb-1">
                            {{-- <form  method="get" action="{{route('contrato',[$item->user_id,$item->anuncio_id,$item->importe])}}">
                            <button type="submit" class="btn btn-primary btn-sm">Contratar</button> --}}
                            <a href="https://wa.me/+51941881489"  target="_blank" class="btn btn-success btn-sm" ><i class="fab fa-whatsapp"></i>Whatsapp</a>
                            {{-- </form> --}}

                    </div>
                    
                </div>
                <div class="col-3">
                    <br>
                    <div class="align-self-center">
                        <div>
                            <p>S/. {{$item->importe}}</p>
                            <div class="form-group">
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                &nbsp;
                            </div>
                            <p>100 % trabajo completado</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <div>
        <h3 class="card-title">Propuestas</h3>
    </div>
    <form  method="get" action="{{route('contratito')}}">
    @foreach ($publicacion as $item)
    <div class="form-check">
    <input class="form-check-input" type="checkbox" value="{{$item->anuncio_id."+".$item->user_id}}" name="contratos[]">    

    <div class="container border">
        <div>
            <div class="d-flex align-items-stretch">
                <div class="col-1">
                    <i class="fas fa-address-card fa-4x"></i>
                </div>
                <div class="col-1"></div>
                <div class="col-2">
                    <br>  
                    <p>{{$item->user->name}} </p>
                    <br>
                    <p>Completado en {{$item->tiempo}} días</p>
                </div>
                <div class="col-1"></div>
                <div class="col-4">
                    <br>
                    <p>{{$item->descripcion}}</p>
                    <p>Desde {{$item->anuncio->ciudad->nombre}}</p>
                    <div class="button-group mb-1">
                            
                            
                            <a href="https://wa.me/+51941881489"  target="_blank" class="btn btn-success btn-sm" ><i class="fab fa-whatsapp"></i>Whatsapp</a>
                            
                    </div>
                </div>
                <div class="col-3">
                    <br>
                    <div class="align-self-center">
                        <div>
                            <p>S/. {{$item->importe}}</p>
                            <div class="form-group">
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                <i class="fa fa-star" aria-hidden="true" style="color:orange"></i>
                                &nbsp;
                            </div>
                            <p>100 % trabajo completado</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @endforeach
    
    <div  id="botones" style="display: none;">

        <button type="submit" class="btn btn-primary btn-sm"  >Contratar</button>
        
    </div>
    
    
</div>
</form>

<div class="col-sm-2 col-md-2 border" style="margin:0% 0% 0% 2%">
    <form action="">
        <h4 class="text-center">Filtros</h4>
            <div class="">
                <p>Monto</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Minimo" min="1" pattern="^[0-9]+" >
                    <span class="input-group-text">-</span>
                    <input type="number" class="form-control" placeholder="Maximo" min="1" pattern="^[0-9]+" >
                </div>
            </div>
            <br>
            <div>
                <p>Calificacion</p>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="Minimo" min="1" pattern="^[0-9]+" >
                    <span class="input-group-text">-</span>
                    <input type="number" class="form-control" placeholder="Maximo"  min="1" pattern="^[0-9]+">
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-success">Buscar</button>
            </div>
        </form>
</div>

</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        $('[name="contratos[]"]').click(function() {
            // Funcion para verificar checked 
            var arr = $('[name="contratos[]"]:checked').map(function(){
            return this.value;
            }).get();
            if(arr.length>0){
                document.getElementById("botones").style.display ="block";
            }else{
                document.getElementById("botones").style.display ="none";
            }
        });
    });
</script>
@endsection


