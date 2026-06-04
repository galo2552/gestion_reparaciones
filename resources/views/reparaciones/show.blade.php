@extends('app')

@section('content')
<div class="container">
    <div class="header-actions">
        <h2>Detalle de Reparación #{{ $reparacion->id }}</h2>
        <div class="header-buttons">
            <a href="{{ route('reparaciones.index') }}" class="btn btn-secondary">
                Volver al Listado
            </a>
            <a href="{{ route('reparaciones.edit', $reparacion->id) }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Editar Datos
            </a>
        </div>
    </div>

    <div class="detail-card">
        <div class="detail-row">
            <div class="detail-label">Nombre del Cliente</div>
            <div class="detail-value fw-semibold">{{ $reparacion->nombre_cliente }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Marca del Celular</div>
            <div class="detail-value">{{ $reparacion->marca }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Modelo del Celular</div>
            <div class="detail-value">{{ $reparacion->modelo }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Fecha de Ingreso</div>
            <div class="detail-value">{{ \Carbon\Carbon::parse($reparacion->fecha_ingreso)->format('d/m/Y') }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Estado de Reparación</div>
            <div class="detail-value">
                <span class="badge badge-{{ Str::slug($reparacion->estado) }}">
                    {{ $reparacion->estado }}
                </span>
            </div>
        </div>

        <div class="detail-row detail-row-column">
            <div class="detail-label">Descripción de la Falla</div>
            <div class="detail-value detail-falla">{{ $reparacion->descripcion_falla }}</div>
        </div>
    </div>
</div>
@endsection
