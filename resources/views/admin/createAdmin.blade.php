<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear admin</title>
</head>
<body>
    <hr>
    @include('parciales.formError')
    <form action="{{ route('admin.store') }}" method="POST">
        @csrf
        
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <label for="email">Correo:</label>
        <input type="email" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" value="{{ old('password') }}" required>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
