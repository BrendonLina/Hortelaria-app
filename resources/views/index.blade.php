<h1>Pagina principal</h1>
@foreach ($quartos as $quarto )
    <h3>{{$quarto->numero}}</h3>
@endforeach

@if(Auth::check())
<a href="/dashboard">Dashboard</a>
@else
    <a href="/login">Login</a>
@endif

<a href="/reserva">Alugar quarto</a>
<a href="/quartosocupados">Consultar quartos ocupados</a>
