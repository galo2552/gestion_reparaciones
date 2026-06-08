@extends('app')

@section('content')
<div class="container">
    <div class="header-actions">
        <h2>Gestión de Usuarios</h2>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            Nuevo Usuario
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        @if ($usuarios->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">👤</div>
                <p>No hay usuarios registrados en el sistema.</p>
                <a href="{{ route('usuarios.create') }}" class="btn btn-secondary">Crear el Primero</a>
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td data-label="Nombre" class="fw-semibold">{{ $usuario->name }}</td>
                            <td data-label="Email">{{ $usuario->email }}</td>
                            <td data-label="Rol">
                                <span class="badge badge-{{ $usuario->rol === 'admin' ? 'reparado' : 'ingresado' }}">
                                    {{ ucfirst($usuario->rol) }}
                                </span>
                            </td>
                            <td data-label="Acciones" class="text-center actions-cell">
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn-action btn-edit" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete" title="Eliminar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
@endsection