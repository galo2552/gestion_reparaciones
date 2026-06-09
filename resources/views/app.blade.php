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
                    <li><a href="{{ route('usuarios.index') }}" class="nav-admin-link">Gestión de Usuarios</a></li>
                @endif
                @auth
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit" class="btn-logout">
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