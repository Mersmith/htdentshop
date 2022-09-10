<x-admin-layout>
    <h2>Nuevo Rol</h2>
    <a href="{{ route('admin.roles.index') }}">Regresar</a>
    <br>
    @if (session('infoCreate'))
        <div>{{ session('infoCreate') }} </div>
    @endif

    <form action="{{ route('admin.roles.store') }}" method="POST">
        @csrf
        <input type="text" name="nombre" placeholder="Ingresar Nombre Rol">
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
        <input type="submit" value="Crear Rol">
    </form>

</x-admin-layout>
