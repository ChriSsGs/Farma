@include('administrativo.components.header')
@include('administrativo.components.navbar')
@if(Session('status'))
    {{ Session('status') }}
@endif
@include('administrativo.components.footer')