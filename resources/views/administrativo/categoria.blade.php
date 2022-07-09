@include('administrativo.components.header')
@include('administrativo.components.navbar')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <!-- add categoria -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addcategoria">
                    Agregar Categoria
                </button>
            </div>
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">nombre</th>
                        <th scope="col">descripcion</th>
                        <th scope="col">estado</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                        <th scope="row">{{ $categoria->id }}</th>
                        <td>{{ $categoria->nombre }}</td>
                        <td>{{ $categoria->descripcion }}</td>
                        <td>{{ $categoria->estado }}</td>
                        <td>
                            <div class='row'>
                                <form class="col-md-2 mx-1" method='POST' action="{{ route('EliminarCategoria', $categoria->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">D</button>
                                </form>
                                <div class="col-md-2 mx-1">
                                  <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editarcategoria{{$categoria->id}}">
                                    E
                                  </button>
                                </div>
                            </div>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-12 d-flex justify-content-center mt-3">
              {{ $categorias }}
            </div>
        </div>
    </div>

  
  <!-- Modal -->
  <div class="modal fade" id="addcategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('AddCategoria')}}">
              @csrf
              <div class="form-floating mb-3">
                <input name='nombre' type="text" autofocus required class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nombre</label>
              </div>
              <div class="form-floating">
                <input name='descripcion' type="text" required class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Descripcion</label>
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
    <!-- Modal Editar-->
    @foreach ($categorias as $categoria)
    <div class="modal fade" id="editarcategoria{{$categoria->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('EditarCategoria', $categoria->id) }}">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                  <input value="{{$categoria->nombre}}" name='nombre' type="text" autofocus required class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Nombre</label>
                </div>
                <div class="form-floating">
                  <input value="{{$categoria->descripcion}}" name='descripcion' type="text" required class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Descripcion</label>
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
  @include('administrativo.components.footer')