<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/clients') }}">Agenda de Clientes</a>
            <div>
               <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Sair</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content') {{-- Aqui entra o conteúdo das views filhas --}}
    </div>

    <footer class="bg-light text-center mt-4 py-3">
        <small>&copy; {{ date('Y') }} - Minha Aplicação Laravel</small>
    </footer>
</body>
</html>
