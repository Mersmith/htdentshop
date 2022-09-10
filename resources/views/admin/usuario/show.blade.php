<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.usuarios.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Usuarios</a>
                </div>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div>User Name: {{ $usuario->name }}</div>
                    <div>User Email: {{ $usuario->email }}</div>
                </div>

                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($usuario->roles)
                            @foreach ($usuario->roles as $usuario_rol)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                    action="{{ route('admin.usuarios.roles.remove', [$usuario->id, $usuario_rol->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $usuario_rol->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.usuarios.roles', $usuario->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="rol" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select id="rol" name="rol" autocomplete="rol-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('rol')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Asignar Rol</button>
                    </div>
                    </form>
                </div>

                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Permisos</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($usuario->permissions)
                            @foreach ($usuario->permissions as $usuario_permiso)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                    action="{{ route('admin.usuarios.permisos.revocar', [$usuario->id, $usuario_permiso->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $usuario_permiso->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.usuarios.permisos.dar', $usuario->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permiso"
                                    class="block text-sm font-medium text-gray-700">Permiso</label>
                                <select id="permiso" name="permiso" autocomplete="permiso-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permisos as $permiso)
                                        <option value="{{ $permiso->name }}">{{ $permiso->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('permiso')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit"
                            class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Asignar Permiso</button>
                    </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    </div>
</x-admin-layout>
