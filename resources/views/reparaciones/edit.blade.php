@extends('app')

@section('content')
<div class="container">
    <div class="header-actions">
        <h2>Editar Reparación #{{ $reparacion->id }}</h2>
        <a href="{{ route('reparaciones.index') }}" class="btn btn-secondary">
            Volver al Listado
        </a>
    </div>

    <form action="{{ route('reparaciones.update', $reparacion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control @error('nombre_cliente') is-invalid @enderror" value="{{ old('nombre_cliente', $reparacion->nombre_cliente) }}">
            @error('nombre_cliente')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="marca">Marca del Celular</label>
                <input type="text" name="marca" id="marca" class="form-control @error('marca') is-invalid @enderror" value="{{ old('marca', $reparacion->marca) }}">
                @error('marca')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="modelo">Modelo del Celular</label>
                <input type="text" name="modelo" id="modelo" class="form-control @error('modelo') is-invalid @enderror" value="{{ old('modelo', $reparacion->modelo) }}">
                @error('modelo')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="descripcion_falla">Descripción de la Falla</label>
            <textarea name="descripcion_falla" id="descripcion_falla" rows="4" class="form-control @error('descripcion_falla') is-invalid @enderror">{{ old('descripcion_falla', $reparacion->descripcion_falla) }}</textarea>
            @error('descripcion_falla')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror" value="{{ old('fecha_ingreso', $reparacion->fecha_ingreso) }}">
                @error('fecha_ingreso')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="estado">Estado de la Reparación</label>
                <select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
                    <option value="" disabled>Seleccione un estado</option>
                    <option value="Ingresado" {{ old('estado', $reparacion->estado) == 'Ingresado' ? 'selected' : '' }}>Ingresado</option>
                    <option value="En reparación" {{ old('estado', $reparacion->estado) == 'En reparación' ? 'selected' : '' }}>En reparación</option>
                    <option value="Reparado" {{ old('estado', $reparacion->estado) == 'Reparado' ? 'selected' : '' }}>Reparado</option>
                    <option value="Entregado" {{ old('estado', $reparacion->estado) == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                </select>
                @error('estado')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>
@endsection
