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
                                <div class="col-md-12">
                                    <p>Gracias por calificar el trabajo de "NOMBRE"</p>
                                    <br>
                                    <div class="">
                                        <div class="form-group">
                                            <p>Las revisiones más largas dan a otros empleadores la
                                                confianza para contratar buenos trabajadores independientes,
                                                como "NOMBRE", y ayuda a garantizar que empleadores como usted
                                                continúen recibiendo nada más que la mejor calidad de trabajo.
                                            </p>
                                        </div>
                                    </div>
                                    <div class="callout-a "><a class="button-3" href="{{route('home')}}">Ir a mis anuncios</a></div>
                                </div>
                        </div>
                    </div><!-- End callout -->
                    <div class="gap"></div>
                </div><!-- End container -->
            </div><!-- End sections -->
        </div><!-- End row -->
    </div><!-- End container -->
</div><!-- End sections -->

@endsection
