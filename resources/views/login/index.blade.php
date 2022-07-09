<!DOCTYPE html>
<html lang="es-PE">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- @include('components.navbar');
    <h1>login</h1>
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form method="POST" action="/login" name='login'>
        @csrf
        <label for="correo">Correo</label>
        <input type="correo" name="correo" id="correo" required autofocus value='{{ old(' correo ') }}' placeholder="correo">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required placeholder="password">
        <label for="recuerdame">recuerdame</label>
        <input type="checkbox" name="recuerdame" id="recuerdame">
        <button type="submit">ingresar</button>
    </form> -->
</body>

<body>
    <div class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <a class="navbar-brand" class="navbar-nav d-lg-none" href="#">Hidden brand</a>
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" class="navbar-nav d-lg-none" href="#">Inicio<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav justify-content-end nav-top">
                        <li>
                            <a href="#" id="" class="nav-link">
                                <i class="fas fa-user"></i>
                                <span class="customer-name"><i class="bi bi-person-circle"></i> Iniciar sesión</span>
                            </a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-dark my-2 my-sm-0" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <section class="vh-100">
        <div class="container pt-5 h-100 mt-10">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="card card-default card-body">
                        <ul id="tabsJustified" class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-target="#tab1" data-toggle="tab">Inicio de sesión</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-target="#tab2" data-toggle="tab">Registro</a>
                            </li>
                        </ul>
                        <br>
                        <div id="tabsJustifiedContent" class="tab-content">
                            <!-- Inicio de sesion -->
                            <div class="tab-pane active" id="tab1">
                                <div class="col">
                                    <!-- Formulario  -->
                                    <form  method="POST" action="/login" name='login'>
                                      @csrf
                                        <!-- Email -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="correo">Correo</label>
                                            <input type="email" class="form-control" name="correo" id="correo" required autofocus value='{{ old('correo') }}' placeholder="Ingresa tu correo" required/>
                                        </div>
                                        <!-- Password -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="palabraSecreta">Contraseña</label>
                                            <input type="password"  name="password" id="password" class="form-control" placeholder="Ingresa tu contraseña" required/>
                                        </div>
                                        <div class="d-flex justify-content-around align-items-center mb-4">
                                            <!-- Checkbox -->
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" name="recuerdame" id="recuerdame" checked />
                                                <label class="form-check-label" for=""> Recuérdame</label>
                                            </div>
                                            <!-- <a href="#" class="text-success">Olvidé la contraseña</a> -->
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-success btn-block">Entrar</button>
                                        <hr>
                                        <p class="text-center">¿Aún no eres miembro?
                                            <a data-toggle="tab" data-target="#tab2" class="text-success" href="#" >
                                                <br>Regístrate</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- Registro -->
                            <div class="tab-pane" id="tab2">
                                <div class="col ">
                                    <!-- Formulario  -->
                                    <form>
                                        <!-- Nombre input -->
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="correo ">Nombre</label>
                                            <input type="text" id=" " name=" " class="form-control" placeholder="Ingresa tu nombre" required>
                                        </div>
                                        <!-- Doble columna -->
                                        <div class="form-row mb-3 ">
                                            <div class="col">
                                                <!-- Genero -->
                                                <div class="form-outline">
                                                    <label class="form-label " for=" ">Género</label>
                                                    <select id=" " class="form-control" required>
                                                        <option selected value="0 ">Elegir</option>
                                                        <option>Masculino</option>
                                                        <option>Femenino</option>
                                                        <option>Prefiero no decir</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <!-- Fecha de nacimiento -->
                                                <label class="form-label" for=" ">Fecha de nacimiento</label>
                                                <input type="date" id="birthday" name="birthday" class="form-control" required>
                                            </div>
                                        </div>
                                        <!-- Email input -->
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="correo ">Correo</label>
                                            <input type="email " id="correo " name="correo " class="form-control" placeholder="Ingresa tu correo " required/>
                                        </div>
                                        <!-- Password input -->
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="palabraSecreta">Contraseña</label>
                                            <input type="password" id="palabraSecreta" name="palabraSecreta" class="form-control" placeholder="Ingresa una contraseña" required/>
                                        </div>
                                        <!-- Submit button -->
                                        <div class="form-outline">
                                            <button type="submit" class="btn btn-info btn-block">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- fin Registro -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
        <footer>
            <div class="container ">
                <hr>
                <div class="row ">
                    <div class="col-12 text-center ">
                        <p>&copy; 2022 Farmacia. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>
</body>
</html>