<x-admin-layout>
    <h2>Roles</h2>
    <a href="{{ route('admin.roles.create') }}">Nuevo Rol</a>
    @if (session('info'))
        <p>{{ session('info') }}</p>
    @endif
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Role</th>
                <th>Controles</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $rol)
                <tr>
                    <td>{{ $rol->id }}</td>
                    <td>{{ $rol->name }}</td>
                    <td style="display: flex;">
                        <a href="{{ route('admin.roles.edit', $rol->id )}}">Editar</a>
                        |
                        <form action="{{ route('admin.roles.destroy', $rol->id )}}" method="POST">
                            @csrf
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
