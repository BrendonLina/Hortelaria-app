<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Login</title>
</head>
<body>
    
    <div class="container-login">
        <div class="login">  
            <h4 class="title-login">Login</h4>
            <form action="/dashboard" method="POST" >
                @csrf
    
                @if(session('danger'))
                    <div class="alert alert-danger">
                        {{session('danger')}}
                    </div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                <div class="mb-3">
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="Seu email">
                    @error('email')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="exampleFormControlInput" name="password" placeholder="Senha" >
                    @error('password')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary form-control" id="btn-entrar" value="Entrar">
                    <a href="/cadastrar">Não tem conta? Cadastre-se!</a>
                    <a href="/">Voltar</a>
                </div>
            </form>
        </div>
    </div>
            
</body>
</html>