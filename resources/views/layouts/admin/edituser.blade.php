@extends('layouts.admin.app')

@section('content')

        <div class="card">
            <h3 class="card-title" >PERFIL DEL USUARIO</h3>

            {{-- <div class="mb-1">
                <div class="mb-3">
                    <label for="image" class="form-label">FOTO</label>
                    <input type="image" class="image" id="name" aria-describedby="image">
                </div>

            </div> --}}

            <div class="mb-2 card-body">


                <form action="{{ route('admin.actualizar', $duser->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row" >
                        <div class="form-group mb-3 col-6">
                        <label for="exampleInputEmail1" class="form-label">Nombres</label>
                        <input type="text" value="{{$duser->name}}" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                        </div>

                        <div class="form-group mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Apellidos</label>
                            <input type="text" value="{{$duser->apellidos}}" class="form-control" id="apellidos" name="apellidos" aria-describedby="emailHelp">
                        </div>

                            <div class="form-group mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Direccion</label>
                            <input type="text" value="{{$duser->direccion}}" class="form-control" id="direccion" name="direccion" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Celular</label>
                            <input type="number" value="{{$duser->celular}}" class="form-control" id="celular" name="celular" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Correo</label>
                            <input type="email" value="{{$duser->email}}" class="form-control" id="correo" name="correo" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Fecha de nacimiento</label>
                            <input type="date" value="{{$duser->fecha_nacimiento}}" class="form-control" id="nacimiento" name="nacimiento" aria-describedby="info">
                            </div>



                            {{--  <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1">
                            </div>  --}}
                    </div>





                    <div style="text-align: center" >
                        <button type="submit" class="btn btn-danger">Submit</button>
                    <a type="button" class="btn btn-primary" href="{{ route('admin.home') }}" >Cancelar</a>
                    </div>
                </form>
            </div>
        </div>


@endsection
