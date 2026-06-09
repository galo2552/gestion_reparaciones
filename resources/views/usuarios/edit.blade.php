@extends('app')

@section('content')
<div class="container">
    <div class="header-actions">
        <h2>Editar Usuario #{{ $usuario->id }}</h2>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
            Volver al Listado
        </a>
    </div>

    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $usuario->name) }}">
            @error('name')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $usuario->email) }}">
            @error('email')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="password">Nueva Contraseña <span style="font-weight:normal; font-size:0.85em;">(dejá vacío para no cambiarla)</span></label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••">
                @error('password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="••••••••">
            </div>
        </div>

        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
                <option value="usuario" {{ old('rol', $usuario->rol) == 'usuario' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('rol')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
    </form>
</div>
@endsection