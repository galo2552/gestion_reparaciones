@extends('app')

@section('content')
<div class="container">
    <div class="form-login">
        <h2>Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="tu@email.com">
                @error('email')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="••••••••">
                @error('password')
                    <span class="error-msg">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>
</div>
@endsection