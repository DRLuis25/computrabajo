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
                            {!! Form::open(['route' => 'anuncio.final']) !!}
                                <div class="col-md-12">
                                    <p>Por favor, deje un comentario y califique a "NOMBRE" en el proyecto "Nombre anuncio"</p>
                                    <br>
                                    <div class="">
                                        <div class="form-group">
                                            <h6>Descripción del anuncio</h6>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates fugiat ut accusamus sit libero quasi numquam quis consequatur doloremque eius, veniam totam architecto ex eum distinctio sequi excepturi dolores ipsa.</p>
                                        </div>
                                        <div class="form-group">
                                            <h6>¿Fue entregado a tiempo?</h6>
                                            <div class="row">
                                                <div class="col-sm-1">
                                                    <input type="radio" id="si" name="a_tiempo" value="1">
                                                </div>
                                                <div class="col-sm-1">
                                                    <label for="html">Si</label>
                                                </div>
                                            </div> 

                                             
                                              <input type="radio" id="no" name="a_tiempo" value="0">
                                              <label for="css">No</label>
                                        </div>
                                        <div class="form-group">
                                            <h6>Valoración</h6>
                                            <div class="form-group">
                                                <h5>Calidad</h5>
                                                <div class="stars">
                                                    <input class="star star-5" id="star-1-5" type="radio" name="star" value="5"/>
                                                    <label class="star star-5" for="star-1-5"></label>
                                                    <input class="star star-4" id="star-1-4" type="radio" name="star" value="4"/>
                                                    <label class="star star-4" for="star-1-4"></label>
                                                    <input class="star star-3" id="star-1-3" type="radio" name="star" value="3"/>
                                                    <label class="star star-3" for="star-1-3"></label>
                                                    <input class="star star-2" id="star-1-2" type="radio" name="star" value="2"/>
                                                    <label class="star star-2" for="star-1-2"></label>
                                                    <input class="star star-1" id="star-1-1" type="radio" name="star" value="1"/>
                                                    <label class="star star-1" for="star-1-1"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Comunicación</h5>
                                                <div class="stars">
                                                    <input class="star star-5" id="star-2-5" type="radio" name="star2" value="5"/>
                                                    <label class="star star-5" for="star-2-5"></label>
                                                    <input class="star star-4" id="star-2-4" type="radio" name="star2" value="4"/>
                                                    <label class="star star-4" for="star-2-4"></label>
                                                    <input class="star star-3" id="star-2-3" type="radio" name="star2" value="3"/>
                                                    <label class="star star-3" for="star-2-3"></label>
                                                    <input class="star star-2" id="star-2-2" type="radio" name="star2" value="2"/>
                                                    <label class="star star-2" for="star-2-2"></label>
                                                    <input class="star star-1" id="star-2-1" type="radio" name="star2" value="1"/>
                                                    <label class="star star-1" for="star-2-1"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Pericia</h5>
                                                <div class="stars">
                                                    <input class="star star-5" id="star-3-5" type="radio" name="star3" value="5"/>
                                                    <label class="star star-5" for="star-3-5"></label>
                                                    <input class="star star-4" id="star-3-4" type="radio" name="star3" value="4"/>
                                                    <label class="star star-4" for="star-3-4"></label>
                                                    <input class="star star-3" id="star-3-3" type="radio" name="star3" value="3"/>
                                                    <label class="star star-3" for="star-3-3"></label>
                                                    <input class="star star-2" id="star-3-2" type="radio" name="star3" value="2"/>
                                                    <label class="star star-2" for="star-3-2"></label>
                                                    <input class="star star-1" id="star-3-1" type="radio" name="star3" value="1"/>
                                                    <label class="star star-1" for="star-3-1"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Profesionalismo</h5>
                                                <div class="stars">
                                                    <input class="star star-5" id="star-4-5" type="radio" name="star4" value="5"/>
                                                    <label class="star star-5" for="star-4-5"></label>
                                                    <input class="star star-4" id="star-4-4" type="radio" name="star4" value="4"/>
                                                    <label class="star star-4" for="star-4-4"></label>
                                                    <input class="star star-3" id="star-4-3" type="radio" name="star4" value="3"/>
                                                    <label class="star star-3" for="star-4-3"></label>
                                                    <input class="star star-2" id="star-4-2" type="radio" name="star4" value="2"/>
                                                    <label class="star star-2" for="star-4-2"></label>
                                                    <input class="star star-1" id="star-4-1" type="radio" name="star4" value="1"/>
                                                    <label class="star star-1" for="star-4-1"></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>¿Contratar de nuevo?</h5>
                                                <div class="stars">
                                                    <input class="star star-5" id="star-5-5" type="radio" name="star5" value="5"/>
                                                    <label class="star star-5" for="star-5-5"></label>
                                                    <input class="star star-4" id="star-5-4" type="radio" name="star5" value="4"/>
                                                    <label class="star star-4" for="star-5-4"></label>
                                                    <input class="star star-3" id="star-5-3" type="radio" name="star5" value="3"/>
                                                    <label class="star star-3" for="star-5-3"></label>
                                                    <input class="star star-2" id="star-5-2" type="radio" name="star5" value="2"/>
                                                    <label class="star star-2" for="star-5-2"></label>
                                                    <input class="star star-1" id="star-5-1" type="radio" name="star5" value="1"/>
                                                    <label class="star star-1" for="star-5-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h6>¿El empleador hizo un gran trabajo?</h6>
                                            <p>Ayude a "NOMBRE" a ganar su próximo proyecto contándoles a todos un poco sobre él.
                                                Las revisiones más largas dan a otros empleadores la confianza para contratar buenos trabajadores
                                                independientes, como "NOMBRE", y ayuda a garantizar que empleadores como usted continúen recibiendo
                                                nada más que la mejor calidad de trabajo.
                                            </p>
                                            <h5>Comentario</h5>
                                            <input type="textarea" name="comentario" id="comentario" class="form-control">
                                        </div>
                                    </div>

                                    <div class="callout-a "><input type="submit" class="button-3"></div>
                                </div>
                            {!! Form::close() !!}

                        </div>
                    </div><!-- End callout -->
                    <div class="gap"></div>
                </div><!-- End container -->
            </div><!-- End sections -->
        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End sections -->



@endsection
@push('css')
    <style>
        div.stars {
    width: 100px;
    display: inline-block;
    }

    input.star { display: none; }

    label.star {
    float: right;
    padding: 3px;
    font-size: 15px;
    color: #444;
    transition: all .2s;
    }

    input.star:checked ~ label.star:before {
    content: '\f005';
    color: #FD4;
    transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
    color: #FE7;
    text-shadow: 0 0 20px #952;
    }

    input.star-1:checked ~ label.star:before { color: #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
    content: '\f006';
    font-family: FontAwesome;
    }
    </style>
@endpush

@push('scripts')

@endpush
