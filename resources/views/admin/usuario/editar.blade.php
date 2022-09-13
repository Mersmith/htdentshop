<x-admin-layout>
    <h2>Editar Roles 2</h2>
    <p>{{ $usuario->name }}</p>
    <br>

    <h3>Lista de Roles</h3>
    @if (session('respuesta'))
        <div>
            <p>{{ session('respuesta') }} </p>
        </div>
    @endif

    <form action="{{ route('admin.usuarios.actualizar', $usuario->id) }}">
        @csrf
        @foreach ($roles as $rol)
            <label>
                <input type="checkbox" name="roles[]" value="{{ $rol->id }}">
                <span>{{ $rol->name }}</span>
            </label>
            <br>
        @endforeach
        <input style="background-color: red; cursor: pointer;" type="submit" value="Enviar">
    </form>

</x-admin-layout>
