<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quarto</title>
</head>
<body>
    <form action="/quarto" method="post">
        @csrf
        <input type="number" name="numero" placeholder="Numero do quarto">
        <input type="number" name="capacidade" placeholder="Capacidade de pessoas">
        <input type="number" name="preco_diaria" placeholder="diaria">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>