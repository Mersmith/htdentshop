<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.usuarios.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Usuarios</a>
                </div>
                <h2>Roles</h2>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div>User Name: {{ $usuario->name }}</div>
                    <div>User Email: {{ $usuario->email }}</div>
                </div>

                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($usuario->roles)
                            @foreach ($usuario->roles as $usuario_rol)
                                <form method="POST" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                    action="{{ route('admin.usuarios.roles.revocar', [$usuario->id, $usuario_rol->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $usuario_rol->name }}</button>
                                </form>
                                <div>
                                    @if ($usuario_rol->permissions)
                                        @foreach ($usuario_rol->permissions as $usuario_rol_permiso)
                                            <p>{{ $usuario_rol_permiso->description }}</p>
                                        @endforeach
                                    @endif
                                    <div>------------------</div>
                                    @php
                                        
                                        print_r('hola');
                                    @endphp
                                    <div>------------------</div>

                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl mt-6">

                        <form method="POST" action="{{ route('admin.usuarios.roles.dar', $usuario) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="rol" class="block text-sm font-medium text-gray-700">Roles</label>
                                <select id="rol" name="rol" autocomplete="rol-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($roles as $rol)
                                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('rol')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror

                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Asignar
                            Rol</button>
                    </div>
                    </form>
                </div>

                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Permisos</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($usuario->permissions)
                            @foreach ($usuario->permissions as $usuario_permiso)
                                <form method="POST" class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
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
                        <form method="POST" action="{{ route('admin.usuarios.permisos.dar', $usuario) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permiso" class="block text-sm font-medium text-gray-700">Permiso</label>
                                <select id="permiso" name="permiso" autocomplete="permiso-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permisos as $permiso)
                                        <option value="{{ $permiso->name }}">{{ $permiso->description }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('permiso')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Asignar
                                    Permiso</button>
                            </div>

                        </form>
                    </div>



                </div>
            </div>

        </div>
    </div>
    </div>
</x-admin-layout>

<script>
    const arrayOne = [{
            name: "4a55eff3-1e0d-4a81-9105-3ddd7521d642",
            display: "Jamsheer"
        },
        {
            name: "644838b3-604d-4899-8b78-09e4799f586f",
            display: "Muhammed"
        },
        {
            name: "b6ee537a-375c-45bd-b9d4-4dd84a75041d",
            display: "Ravi"
        },
        {
            name: "e97339e1-939d-47ab-974c-1b68c9cfb536",
            display: "Ajmal"
        },
        {
            name: "a63a6f77-c637-454e-abf2-dfb9b543af6c",
            display: "Ryan"
        },
    ];

    const arrayTwo = [{
            name: "4a55eff3-1e0d-4a81-9105-3ddd7521d642",
            display: "Jamsheer"
        },
        {
            name: "644838b3-604d-4899-8b78-09e4799f586f",
            display: "Muhammed"
        },
        {
            name: "b6ee537a-375c-45bd-b9d4-4dd84a75041d",
            display: "Ravi"
        },
        {
            name: "e97339e1-939d-47ab-974c-1b68c9cfb536",
            display: "Ajmal"
        },
    ];

    function showMessage(arrayOne, arrayTwo) {
        const results = arrayOne.filter(({
            name: id1
        }) => !arrayTwo.some(({
            name: id2
        }) => id2 === id1));

        return results;
    }

    console.log(showMessage(arrayOne, arrayTwo))
</script>
