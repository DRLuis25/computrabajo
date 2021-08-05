@extends('welcome')

@section('content')
<div class="navegacionBotones">
    <button type="button" class="btn btn-primary">Detalles</button>
    <button type="button" class="btn btn-primary">Propuestas</button>
</div>
<h4 class="tupropuesta">Tu propuesta</h4> 
<div class="D_CajaPadre">
    <section class="D_Izquierda" >
        <i class="fa fa-user"></i>

        <span class="spanizq">{{auth()->user()->name}}</span>
        <span class="spanizq">{{auth()->user()->email}}</span>
        <span class="soles"> {{$monto}} soles</span><br>
        <span class="calificacion">Calificacion</span>
        <span class="dias"> {{$tiem}} dias</span> 
         <br><br><br>
        <span>{{$desc}}</span>
    </section >
    <aside class="D_Derecha">

    </aside>
</div>
<h4 class="tupropuesta">Otras propuestas</h4> 
@endsection