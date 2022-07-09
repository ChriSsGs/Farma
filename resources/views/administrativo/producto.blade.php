@include('administrativo.components.header')
@include('administrativo.components.navbar')
 
<main>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- add categoria -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProducto">
                    Agregar Productos
                </button>
            </div>
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th class="justify-center" scope="col">#</th>
                        <th class="justify-center" scope="col">imagen</th>
                        <th class="justify-center" scope="col">nombre</th>
                        <th class="justify-center" scope="col">descripcion</th>
                        <th class="justify-center" scope="col">observaciones</th>
                        <th class="justify-center" scope="col">vencimiento</th>
                        <th class="justify-center" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                      @if (!empty($productos))
                        @foreach ($productos as $key => $producto)
                        @if ($stocks[$key]->stock < 1)
                        <tr class="bg-danger">
                        @else
                        <tr class="bg-light">
                        @endif
                        <th scope="row">{{ $producto->id }}</th>
                        <td scope="row"><img class="d-block img m-auto" src='{{ $producto->imagen }}' width="50" height="50"></td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->observacion }}</td>
                        <?php 
                          $mytime = Carbon\Carbon::now();
                          $mytime->toDateString();

                          $daysmore = date("d-m-Y",strtotime($producto->caducidad."- 1 week"));
                        ?>
                        <td @if($mytime->gt($daysmore)) class="bg-warning" @endif>{{ $producto->caducidad }}</td>
                        <td>
                            <div class='row'>
                                <form class="col-md-1 mx-1" method='POST' action="{{ route('EliminarProducto', $producto->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                      <i class="bi bi-archive"></i>
                                    </button>
                                </form>
                                <div class="col-md-1 mx-1">
                                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#EditarProducto{{$producto->id}}">
                                    <i class="bi text-white bi-pencil-square"></i>
                                  </button>
                                </div>
                                <div class="col-md-1 mx-1">
                                  <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editarStock{{$stocks[$key]->id}}">
                                    <i class="bi bi-boxes"></i>
                                  </button>
                                </div>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <div class="col-md-12">

            </div>
        </div>
    </div>

  <!-- Modal -->
  <div class="modal fade" id="addProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('AddProducto')}}">
              @csrf

              <div class="form-floating mb-3">
                <select name='categoria_id' class="form-select" id="categoria_id" aria-label="Floating label select example" required>
                  <option selected>Abre y selecciona una categoria</option>
                  @foreach ($categorias as $categoria)
                  <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                  @endforeach
                </select>
                <label for="categoria_id">Selecciona una categoria</label>
              </div>

              <div class="form-floating mb-3">
                <select name='subcategoria_id' class="form-select" id="subcategoria_id" aria-label="Floating label select example" required>
                  <option selected>Abre y selecciona una subcategoria</option>
                  @foreach ($subcategorias as $subcategoria)
                  <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
                  @endforeach
                </select>
                <label for="subcategoria_id">Selecciona una subcategoria</label>
              </div>

              <div class="form-floating mb-3">
                <input name='nombre' type="text" autofocus required class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nombre</label>
              </div>

              <div class="form-floating mb-3">
                <input name='descripcion' type="text" required class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Descripcion</label>
              </div>

              <div class="form-floating mb-3">
                <input name='observacion' type="text" required class="form-control" id="floatingobservacion" placeholder="observacion">
                <label for="floatingobservacion">Observacion</label>
              </div>

              <div class="form-floating mb-3">
                <input name='caducidad' type="date" required class="form-control" id="floatingcaducidad" placeholder="caducidad">
                <label for="floatingcaducidad">Caducidad</label>
              </div>

              <div class="form-floating mb-3">
                <input name='precio' type="text" required class="form-control" id="floatingprecio" placeholder="precio">
                <label for="floatingprecio">precio</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</main>

  <!-- Modal -->
  @if (!empty($productos))
  @foreach ($productos as $key => $producto)
  <div class="modal fade" id="EditarProducto{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('EditarProducto',['id'=>$producto->id])}}">
              @csrf
              @method('PUT')
              <div class="form-floating mb-3">
                <select name='categoria_id' class="form-select" id="categoria_id" aria-label="Floating label select example" required>
                  <option selected>Abre y selecciona una categoria</option>
                  @foreach ($categorias as $categoria)
                  <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                  @endforeach
                </select>
                <label for="categoria_id">Selecciona una categoria</label>
              </div>

              <div class="form-floating mb-3">
                <select name='subcategoria_id' class="form-select" id="subcategoria_id" aria-label="Floating label select example" required>
                  <option selected>Abre y selecciona una subcategoria</option>
                  @foreach ($subcategorias as $subcategoria)
                  <option value="{{$subcategoria->id}}">{{$subcategoria->nombre}}</option>
                  @endforeach
                </select>
                <label for="subcategoria_id">Selecciona una subcategoria</label>
              </div>

              <div class="form-floating mb-3">
                <input name='nombre' type="text" autofocus required class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nombre</label>
              </div>

              <div class="form-floating mb-3">
                <input name='descripcion' type="text" required class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Descripcion</label>
              </div>

              <div class="form-floating mb-3">
                <input name='observacion' type="text" required class="form-control" id="floatingobservacion" placeholder="observacion">
                <label for="floatingobservacion">Observacion</label>
              </div>

              <div class="form-floating mb-3">
                <input name='caducidad' type="date" required class="form-control" id="floatingcaducidad" placeholder="caducidad">
                <label for="floatingcaducidad">Caducidad</label>
              </div>

              <div class="form-floating mb-3">
                <input name='precio' type="number" required class="form-control" id="floatingprecio" placeholder="precio">
                <label for="floatingprecio">precio</label>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
  @endif


<!-- Modal Editar-->
@if (!empty($stocks))
@foreach ($stocks as $stock)
<div class="modal fade" id="editarStock{{$stock->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Stock</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('EditarStock', $stock->id) }}">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3">
              <input value="{{$stock->stock}}" name='stock' type="text" autofocus required class="form-control" id="floatingInput">
              <label for="floatingInput">Stock</label>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach
@endif
@include('administrativo.components.footer')