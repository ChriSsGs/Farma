@include('web.header.headerweb');
@include('web.navbar.navbarweb');
        <!-- Page Content -->
        <div id="" class="container-fluid" style="margin-top:2rem;">
        <!-- Products Section -->

    <div class="container-fluid">
  <div class="px-lg-5">

    <!-- Slider de Colores/Introduccion -->
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="text-white p-5 shadow-sm rounded banner" style="background: #a770ef; background: linear-gradient(to right, #102400, #137909, #00ff5e);">
          <h1 class="display-4 font-weight-bold">Tu Farmacia</h1>
          <p class="lead">Estamos al alcance de todos los peruanos.</p>
          <p class="lead">Tu Farmacia es un establecimiento que provee de atención farmacéutica especializada con seguridad, oportunidad y calidad.
              <br>Abastecemos, dispensamos y realizamos seguimiento fármaco terapéutico y de fármaco vigilancia.
          </p>
        </div>
      </div>
    </div>
    <!-- End -->

    <div class="row">
      <!-- Galería de items-->
      @foreach ($productos as $producto)
      <a class="col-xl-3 col-lg-4 col-md-6 mb-4" style="text-decoration:none" href="#">
      <form method="POST" action="{{ route('carritoGuardado')}}">
        @csrf
        <input hidden name='producto' value='{{Crypt::encrypt($producto->id);}}'>
        <div class="bg-white rounded shadow-sm"><img src="{{ asset($producto->imagen) }}" width="150" height="150" alt="" class="mx-auto d-block">
          <div class="p-4">
            <h5 class="text-success">{{$producto->nombre}}</h5>
            <p class="small text-muted mb-0">{{$producto->descripcion}}</p>
            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
              <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="h6 text-danger font-weight-bold">S/ {{ $producto->precio }}</span></p>
              <div class="badge badge-warning px-3 rounded-pill font-weight-normal text-white">Nuevo</div>
            </div>
             <div class="d-grid mt-3 col-12 ">
               <button class="btn btn-success w-100" type="submit">Agregar al carrito</button>
             </div>
          </div>
        </div>
      </form>
      </a>    
      @endforeach

    </div>
    <!-- <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Mostrar más</a></div> -->
  </div>
</div>

<!-- Footer -->
<div class="container ">
    <hr>
    <footer>
        <div class="row">
            <div class="col-12 text-center">
                        <p>&copy; 2022 Farmacia. Todos los derechos reservados.</p>
                    </div>
                </div>
            </footer>
        </div>

<!-- Script to Activate Tooltips -->
<script>
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
    $('.carousel').carousel()
})
</script>
    <script src="//cdn.jsdelivr.net/bootstrap.filestyle/1.1.0/js/bootstrap-filestyle.min.js"></script>
    <script src="https://assets.jumpseller.com/store/bootstrap/themes/382017/main.js?1619113824"></script>        
</body>
</html>