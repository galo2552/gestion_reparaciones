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
                @if(auth()->check() && auth()->user()->rol === 'admin')
                    <li><a href="{{ route('usuarios.index') }}" style="color: #6e6e6e; font-weight: bold;">Gestión de Usuarios</a></li>
                @endif
                @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background: none; border: none; color: #6e6e6e; text-decoration: underline; cursor: pointer; padding: 0; font-family: inherit; font-size: inherit;">
                            Cerrar Sesión
                        </button>
                    </form>
                </li>
                @endauth
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