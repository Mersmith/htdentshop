<x-admin-layout>
    <h2>Editar Rol</h2>
    <a href="{{ route('admin.roles.index') }}">Regresar</a>
    <p>{{ $rol->guard_name }} </p>
    <br>

    @if (session('info'))
        <div>{{ session('info') }} </div>
    @endif

    <form action="{{ route('admin.roles.update', $rol->id) }}">
        @csrf
        @method('PUT')
        <input type="text" name="nombre" value="{{ $rol->name }}" placeholder="Ingresar Nombre Rol">
        @error('nombre')
            <p>{{ $message }}</p>
        @enderror
        <br>
        <h2>Lista de Permisos</h2>
         @foreach ($permisos as $permiso)
            <div>
                <label>
                    <input type="checkbox" name="permisos[]" value="{{ $permiso->id }}" id="">
                    {{ $permiso->name }}
                </label>

            </div>
        @endforeach
        <br>
        <input type="submit" value="Editar Rol">
    </form>
</x-admin-layout>
