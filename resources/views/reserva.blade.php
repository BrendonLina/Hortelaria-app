<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Reserva</title>
</head>
<body>
    <form action="/reserva" method="post">
        <h3>Reserva dos quartos disponivéis</h3>
        @csrf

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
         @endif
        
        <select name="quarto" id="quarto" class="form-control">
            @foreach($quartosDisponiveis as $quarto)
                <option value="{{ $quarto->id }}">{{ $quarto->numero }}</option>
            @endforeach
        </select>
        @error('quarto')
            <span>{{ $message }}</span>
        @enderror

        <label for="data_checkin">Data de Check-in:</label>
        <input type="date" name="data_checkin" id="data_checkin" class="form-control" required>
        @error('data_checkin')
            <span>{{ $message }}</span>
        @enderror

        <label for="data_checkout">Data de Check-out:</label>
        <input type="date" name="data_checkout" id="data_checkout" class="form-control" required>
        @error('data_checkout')
            <span>{{ $message }}</span>
        @enderror

        <button type="submit" class="button btn btn-primary">Reservar</button>
        <a href="/dashboard">voltar</a>
               
    </form>
</body>
</html>