<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Quarto</title>
</head>
<body>
    <form action="/quarto" method="post">
        @csrf

        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        <h3>Cadastrar quarto</h3>
        <input type="number" class="form-control" name="numero" placeholder="Numero do quarto">
        @error('numero')
            <span>{{ $message }}</span>
        @enderror
        <input type="number" class="form-control" name="capacidade" placeholder="Capacidade de pessoas">
        @error('capacidade')
            <span>{{ $message }}</span>
        @enderror
        <input type="number" class="form-control" name="preco_diaria" placeholder="diaria">
        @error('preco_diaria')
            <span>{{ $message }}</span>
        @enderror
        <input type="submit" class="btn btn-primary form-control" value="Cadastrar">
        <a href="/dashboard">Voltar</a>
    </form>
</body>
</html>