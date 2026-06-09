@extends('app')

@section('content')
<div class="container">
    <div class="header-actions">
        <h2>Crear Nuevo Usuario</h2>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
            Volver al Listado
        </a>
    </div>

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Ej. Juan Pérez">
            @error('name')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="juan@email.com">
            @error('email')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••">
                @error('password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="••••••••">
            </div>
        </div>

        <div class="form-group">
            <label for="rol">Rol</label>
            <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
                <option value="" disabled selected>Seleccione un rol</option>
                <option value="usuario" {{ old('rol') == 'usuario' ? 'selected' : '' }}>Usuario</option>
                <option value="admin" {{ old('rol') == 'admin' ? 'selected' : '' }}>Administrador</option>
            </select>
            @error('rol')
                <span class="error-msg">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
    </form>
</div>
@endsection