    <!-- Nav Bar -->
    <div class="fixed-top ">
        <nav class="navbar navbar-expand-lg navbar-dark shadow-lg bg-success ">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" class="navbar-nav d-lg-none" href="#">
                    <img src="{{ asset('img/logo.png') }}" alt="" width="50" height="50">
                    </a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" class="navbar-nav d-lg-none" href="{{ route('home') }}">Inicio<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item"> 
                            <a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contacto') }}">Contacto</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav justify-content-end nav-top">
                        <li class="nav-item">
                            <a href="{{ route('login') }}" id="" class="nav-link">
                                <i class="bi bi-person-circle"></i> Iniciar sesión
                            </a>
                        </li>
                    </ul>
                </div>
                    <a href="{{ route('carritocompras') }}" type="button" class="btn btn-success position-relative">
                        <i class="bi h5 rounded bi-bag-fill"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                          @if(empty(Session::get('carrito')))
                            0
                          @else
                            {{ count(Session::get('carrito')) }}
                          @endif
                        </span>
                    </a>
                </div>
            </div>
        </nav>
    </div>