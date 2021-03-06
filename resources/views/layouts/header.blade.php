<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @include('layouts.menu')
            </ul>

            @if (Auth::check())
                <div class="text-end">
                    
                    <a href="{{route('perfilUsuario.index')}}" type="button" class="btn btn-outline-light me-2">Mi Perfil</a>

                    <a href="#" class="btn btn-warning"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Salir
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @else
                <div class="text-end">
                    <a href="{{route('login')}}" type="button" class="btn btn-outline-light me-2">Ingresar</a>
                    <a href="{{route('register')}}" type="button" class="btn btn-warning">Registrarse</a>
                </div>
            @endif

        </div>
    </div>
</header>
<header class="p-3" id="text-end">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            </ul>
            <div class="text-end" >
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="{{route("anuncio.misanuncios")}}" class="nav-link px-2 text-secondary">Empleador</a></li>
                    <li><a href="{{route("postulacion.index")}}" class="nav-link px-2 text-secondary">Colaborador</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
