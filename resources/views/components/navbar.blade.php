<a href="/">Home</a><br>
@auth
<a href="menu-administrativo">Menu</a><br>
<form style='display:inline' action="logout" method="POST">
    @csrf
    <a href="#" onclick="this.closest('form').submit()">Cerrar Sesion</a>
</form>
@else
<a href="login">Iniciar Sesion</a><br>
@endauth