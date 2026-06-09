@extends('app')

@section('content')
<div class="container">
    <div class="header-actions">
        <h2>Listado de Reparaciones</h2>
        <a href="{{ route('reparaciones.create') }}" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            Nueva Reparación
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="filter-bar">
        <form action="{{ route('reparaciones.index') }}" method="GET" class="filter-form">
            <label for="filter_estado">Filtrar por Estado:</label>
            <select name="estado" id="filter_estado" class="form-control filter-select" onchange="this.form.submit()">
                <option value="">Todos los estados</option>
                <option value="Ingresado" {{ request('estado') == 'Ingresado' ? 'selected' : '' }}>Ingresado</option>
                <option value="En reparación" {{ request('estado') == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                <option value="Reparado" {{ request('estado') == 'Reparado' ? 'selected' : '' }}>Reparado</option>
                <option value="Entregado" {{ request('estado') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
            </select>
            @if (request('estado'))
                <a href="{{ route('reparaciones.index') }}" class="btn btn-secondary btn-clear">Limpiar Filtro</a>
            @endif
        </form>
    </div>

    <div class="table-responsive">
        @if ($reparaciones->isEmpty())
            <div class="empty-state">
                <div class="empty-icon">📱</div>
                <p>No hay reparaciones registradas en el sistema.</p>
                <a href="{{ route('reparaciones.create') }}" class="btn btn-secondary">Registrar la Primera</a>
            </div>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reparaciones as $reparacion)
                        <tr>
                            <td data-label="Cliente" class="fw-semibold">{{ $reparacion->nombre_cliente }}</td>
                            <td data-label="Marca">{{ $reparacion->marca }}</td>
                            <td data-label="Modelo">{{ $reparacion->modelo }}</td>
                            <td data-label="Estado">
                                <span class="badge badge-{{ Str::slug($reparacion->estado) }}">
                                    {{ $reparacion->estado }}
                                </span>
                            </td>
                            <td data-label="Acciones" class="text-center actions-cell">
                                <a href="{{ route('reparaciones.show', $reparacion->id) }}" class="btn-action btn-show" title="Ver detalle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="{{ route('reparaciones.edit', $reparacion->id) }}" class="btn-action btn-edit" title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form action="{{ route('reparaciones.destroy', $reparacion->id) }}" method="POST" class="delete-form" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta reparación? Esta acción no se puede deshacer.');">
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
