<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>cadastrar</title>
</head>
<body>
    <h3>cadastrando colaborador</h3>
    <form action="/cadastrar" method="POST">
        @csrf

        <input type="text" name="nome" placeholder="Seu nome">
        <input type="email" name="email" placeholder="Seu Email">
        <input type="number" name="telefone" placeholder="Telefone">
        <input type="password" name="password" placeholder="Senha">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>