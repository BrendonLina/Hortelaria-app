<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h3>Login</h3>

    @if(session('danger'))
        <div class="alert alert-danger">
            {{session('danger')}}
        </div>
    @endif

    <form action="{{route('dashboard')}}" method="POST">
        @csrf
        <input type="email" placeholder="Email" name="email">
        @error('email')
            <span>{{$message}}</span>
        @enderror
        <input type="password" placeholder="Senha" name="password">
        @error('password')
            <span>{{$message}}</span>
        @enderror
        <input type="submit" value="Entrar">
        <a href="/cadastrar">não tem conta? cadastre-se!</a>
    </form>
</body>
</html>