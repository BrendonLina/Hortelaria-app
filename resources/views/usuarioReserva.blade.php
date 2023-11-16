<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Minhas reservas</title>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 custom-box">
                <h3>Minhas reservas:</h3>
                @if(count($reservasUsuario) <= 0)
                    <p>Não há reservas feita por você!</p>
                @endif
                @foreach ($reservasUsuario as $reserva)
                    <p>Seu checkin: {{$reserva->data_checkin}}</p>
                    <p>Seu checkout: {{$reserva->data_checkout}}</p>
                @endforeach
                <a href="/dashboard">voltar</a>
            </div>
        </div>
    </div>
    
</body>
</html>