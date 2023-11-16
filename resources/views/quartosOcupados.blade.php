<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta quarto</title>
</head>
<body>
    <h1>Consulta de Quartos Ocupados</h1>

    <form action="/quartosocupados" method="post">
        @csrf
        <label for="data_especifica">Selecione uma data:</label>
        <input type="date" name="data_especifica" required>
        <button type="submit">Consultar</button>
    </form>
    
    <h2>Quartos Ocupados:</h2>

    @if($quartosOcupados == "")
        <p>Nenhum quarto ocupado na data especificada.</p>
    @elseif ($quartosOcupados->isEmpty())
        <p>Nenhum quarto ocupado na data especificada.</p>
    @else
        <ul>
            @foreach($quartosOcupados as $quarto)
                <li>{{ $quarto->numero }}</li>
            @endforeach
        </ul>
    
    @endif
    
</body>
</html>