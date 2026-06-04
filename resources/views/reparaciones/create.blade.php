@extends('app')

@section('content')
<div class="container">
    <div class="header-actions">
        <h2>Registrar Nueva Reparación</h2>
        <a href="{{ route('reparaciones.index') }}" class="btn btn-secondary">
            Volver al Listado
        </a>
    </div>

    <form action="{{ route('reparaciones.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control @error('nombre_cliente') is-invalid @enderror" value="{{ old('nombre_cliente') }}" placeholder="Ej. Juan Pérez">
            @error('nombre_cliente')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label for="marca">Marca del Celular</label>
                <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca') }}" placeholder="Ej. Samsung, Apple, Motorola">
                @error('marca')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="modelo">Modelo del Celular</label>
                <input type="text" name="modelo" id="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo') }}" placeholder="Ej. Galaxy S23, iPhone 15, Edge 40">
                @error('modelo')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion_falla">Descripción de la Falla</label>
            <textarea name="descripcion_falla" id="descripcion_falla" rows="4" class="form-control @error('descripcion_falla') is-invalid @enderror" placeholder="Describa el problema detalladamente (ej. pantalla rota, no carga, se apaga solo)">{{ old('descripcion_falla') }}</textarea>
            @error('descripcion_falla')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', date('Y-m-d')) }}">
                @error('fecha_ingreso')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado">Estado de la Reparación</label>
                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                    <option value="" disabled selected>Seleccione un estado</option>
                    <option value="Ingresado" {{ old('estado') == 'Ingresado' ? 'selected' : '' }}>Ingresado</option>
                    <option value="En reparación" {{ old('estado') == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                    <option value="Reparado" {{ old('estado') == 'Reparado' ? 'selected' : '' }}>Reparado</option>
                    <option value="Entregado" {{ old('estado') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                </select>
                @error('estado')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Registrar Reparación</button>
        </div>
    </form>
</div>

<style>
    /* Estilos extra específicos para formulario responsivo */
    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr !important;
            gap: 0 !important;
        }
    }
</style>
@endsection
