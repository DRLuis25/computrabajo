@extends('welcome')

@section('content')
    <div class="navegacionBotones">
        <button type="button" class="btn btn-primary">Detalles</button>
        <button type="button" class="btn btn-primary">Propuestas</button>
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
                <span class="calificacion">Calificacion</span>
                <span class="dias"> {{ $tiem }} dias</span> <br>
            </div>
            <span>{{ $desc }}</span>
            <div class="D_botones">
                <button type="button" class="btn btn-danger">Eliminar</button>
                <button type="button" class="btn btn-success">Editar</button>
            </div>
        </section>

        <aside class="D_Derecha">

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
                    <span class="calificacion">Calificacion</span>
                    <span class="dias"> {{ $item->tiempo }} dias</span>
                    <br><br>
                </div>
                <span>{{ $item->descripcion }}</span>

            </section>
        </div><br>
    @endforeach
@endsection
