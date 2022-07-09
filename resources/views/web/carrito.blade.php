@include('web.header.headerweb');
@include('web.navbar.navbarweb');


@if (!empty(Session::get('carrito')))
    
@php
    // SDK de Mercado Pago
    require  base_path('vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia
    $t = count(Session::get('carrito'));
    $items = [];
    for($i=0;$i<$t;$i++){
        $item = new MercadoPago\Item();
        $item->title = Session::get('carrito')[$i]->nombre;
        $item->quantity = 1;
        $item->unit_price = Session::get('carrito')[$i]->precio;
        $items[$i] = $item;
    }
    $preference->items = $items;
    $preference->save();
@endphp

<link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">

    <main>
      <!-- Shopping Cart -->
      <section class="shopping-cart dark mt-5">
        <div class="container" id="container">
          <div class="block-heading">
            <h2 class="text-success">Carrito de compras</h2> 
          </div>
          <div class="content shadow-lg">
            <div class="row">
              <div class="col-md-12 col-lg-8">
                <div class="items">
                  <div class="product">
                    <div class="info">
                        <?php $subtotal = 0; ?>
                    @foreach (Session::get('carrito') as $item)
                      <div class="product-details">
                        <div class="row justify-content-md-center">
                          <div class="col-md-3">
                            <img class="mx-auto d-block" width="150" height="150" src="{{ asset($item->imagen) }}">
                          </div>
                          <div class="col-md-4 product-detail">
                            <h5 class="text-success">Producto</h5>
                            <div class="product-info">
                              <p><b>Nombre: </b><span id="product-description">{{$item->nombre}}</span><br>
                              <b>Cantidad: </b>1<br>
                              <b>Precio:</b> S/ <span id="unit-price">{{$item->precio}}</span></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php $subtotal = $subtotal + $item->precio ?>           
                    @endforeach
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-lg-4">
                <div class="summary">
                  <h3>Carrito</h3>
                  <div class="summary-item"><span class="text">Subtotal</span><span class="price" id="cart-total">s/ {{ number_format($subtotal)}}</span></div>
                  <div class="checkout-btn"></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--payment-->

      <!-- footer -->
    </main>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        // Agrega credenciales de SDK
        const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
          locale: "es-PE",
        });
      
        // Inicializa el checkout
        mp.checkout({
          preference: {
            id: "{{$preference->id}}",
          },
          render: {
            container: ".checkout-btn", // Indica el nombre de la clase donde se mostrará el botón de pago
            label: "Pagar", // Cambia el texto del botón de pago (opcional)
          },
        });
      </script>

@else

<section class=" container shopping-cart dark mt-5 py-5">
    <div class="px-4 py-5 my-5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="#55ff22" class="bi bi-bag-dash-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM6 9.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1H6z"/>
          </svg>
        <h1 class="display-5 fw-bold">No hay productos en el carrito</h1>
      </div>
  </section>
  @endif