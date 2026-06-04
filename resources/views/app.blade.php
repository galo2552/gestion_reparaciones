<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Reparaciones</title>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header>
        <h1>Sistema de Gestión de Reparaciones</h1>
        <nav>
            <ul>
                <li><a href="{{ route('reparaciones.index') }}">Listado de Reparaciones</a></li>
                <li><a href="{{ route('reparaciones.create') }}">Nueva Reparación</a></li>
            </ul>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>Trabajo Práctico Parcial N°2 - Producción Web</p>
    </footer>
</body>
</html>