<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva</title>
</head>
<body>
    <form action="/reserva" method="post">
        <h3>Reserva dos quartos disponivéis</h3>
        @csrf
        
        <select name="quarto" id="quarto">
            @foreach($quartosDisponiveis as $quarto)
                <option value="{{ $quarto->id }}">{{ $quarto->numero }}</option>
            @endforeach
        </select>

        <label for="data_checkin">Data de Check-in:</label>
        <input type="date" name="data_checkin" id="data_checkin" required pattern="\d{4}-\d{2}-\d{2}">

        <label for="data_checkout">Data de Check-out:</label>
        <input type="date" name="data_checkout" id="data_checkout" required pattern="\d{4}-\d{2}-\d{2}">

        <button type="submit">Reservar</button>
               
    </form>
</body>
</html>