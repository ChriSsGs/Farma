@include('web.header.headerweb');
@include('web.navbar.navbarweb');
    <!-- Fin de Nav Bar -->
    
    <!-- Termina la definición del menú -->
        <main role="main" class="container" style="margin-top: 6rem;">
            <div class="card card-default card-body bg-light">
                <div class="row">
                    <div class="col-12">
                        <h2>Formulario de Contacto</h2>
                    </div>
                    <div class="col-12">
                        <form method="POST" action="contacto.php">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input name="nombre" required type="text" id="nombre"
                                    class="form-control" placeholder="Ingresa tu nombre">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo electrónico</label>
                                <input name="correo" required type="email" id="correo"
                                    class="form-control" placeholder="Ingresa tu correo electrónico">
                            </div>
                            <div class="form-group">
                                <label for="mensaje">Mensaje</label>
                                <textarea required placeholder="Escribe tu mensaje"
                                    class="form-control" name="mensaje" id="mensaje"
                                    cols="30" rows="4"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn-success btn" type="submit">
                                    Enviar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
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
