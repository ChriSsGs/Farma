<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Panel Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Almacen
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="{{ route('categorias') }}">Categorias</a></li>
              <li><a class="dropdown-item" href="{{ route('subcategorias') }}">SubCategorias</a></li>
              <li><a class="dropdown-item" href="{{ route('productos') }}">Productos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="">Stock</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Ventas
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="{{ route('ordendecompra')}}">Orden de compra</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Diseño Web
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">Home</a></li>
              <li><a class="dropdown-item" href="#">Ofertas</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              SEO
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">Departamento</a></li>
              <li><a class="dropdown-item" href="#">Categorias</a></li>
              <li><a class="dropdown-item" href="#">SubCategorias</a></li>
              <li><a class="dropdown-item" href="#">Productos</a></li>
            </ul>
          </li>
        </ul>
        <div class="d-flex" role="search">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary bg-white text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Nombre del usuario
            <img class="img-circle" src="/docs/5.2/assets/brand/bootstrap-logo.svg" alt="" width="40" height="40">
          </button>
        </div>
      </div>
    </div>
  </nav>


  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        info del usuario registrado
      </div>
      <div class="modal-footer">
        <form action="/logout" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">Cerrar session</button>
        </form>
      </div>
    </div>
  </div>
</div>