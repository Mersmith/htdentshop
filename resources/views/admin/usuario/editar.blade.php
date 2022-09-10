<x-admin-layout>
    <h2>Editar Roles</h2>
    <p>{{ $usuario->name }}</p>
    <br>

    <h3>Lista de Roles</h3>
    @if (session('respuesta'))
        <div>
            <p>{{ session('respuesta') }} </p>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.usuarios.actualizar', $usuario) }}">
        @method('PUT')
        @csrf
        @foreach ($roles as $role)
            <div>
                <label>
                    <input type="checkbox" name="roles[]" value="{{ $role->id }}" />
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
        <input style="background-color: red; cursor: pointer;" type="submit" value="Enviar">
    </form>

</x-admin-layout>
