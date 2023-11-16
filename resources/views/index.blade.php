<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/pagina.css') }}">
    <title>Home</title>
</head>
<body>
    <header class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">Hortelaria</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
            
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="/dashboard">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="/reserva">Alugar Quarto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/quartosocupados">Consultar quartos ocupados</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <section class="custom-section">
        <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach( $quartos as $quarto)
                    <div class="col">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Imagem do Card">
                            <div class="card-body">
                                <h5 class="card-title">{{$quarto->numero}}</h5>
                                <p class="card-text">Quarto disponível</p>
                            </div>
                        </div>
                    </div>      
                @endforeach
            </div>
        </section>

        <footer class="custom-footer">
            <p>Desenvolvido por: Brendon Lina</p>
        </footer>

</body>
</html>





