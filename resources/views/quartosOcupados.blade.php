<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Consulta quarto</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/quartosocupados" method="post">
                    @csrf
                    <label for="data_especifica">Selecione uma data:</label>
                    <input type="date" name="data_especifica" required class="form-control">
                    <button type="submit" class="btn btn-primary mt-2">Consultar</button>
                    <a href="/">voltar</a>
                </form>
            </div>
        </div>
    
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <h2>Quartos Ocupados:</h2>
    
                @if($quartosOcupados == "")
                    <p>Nenhum quarto ocupado na data especificada.</p>
                @elseif ($quartosOcupados->isEmpty())
                    <p>Nenhum quarto ocupado na data especificada.</p>
                @else
                    <ul>
                        @foreach($quartosOcupados as $quarto)
                            <li>Quarto <b>{{ $quarto->numero }}</b></li>
                        @endforeach
                    </ul>
                    <ul>
                        @foreach($quartosOcupados as $quarto)
                            <li>ocupado até a data: {{ $quarto->reservas->first()->data_checkout }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>

    
</body>
</html>