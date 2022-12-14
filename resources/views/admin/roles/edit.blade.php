<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('admin.roles.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 text-slate-100 rounded-md">Roles</a>
                </div>
                <h2>Editar ROL</h2>
                <div class="flex flex-col p-2 bg-slate-100">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                        <form action="{{ route('admin.roles.update', $rol->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="nombre" class="block text-sm font-medium text-gray-700"> Rol nombre
                                </label>
                                <div class="mt-1">
                                    <input type="text" id="nombre" name="nombre" value="{{ $rol->name }}"
                                        class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                                </div>
                                @error('nombre')
                                    <span class="text-red-400 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            @foreach ($permisos as $permiso)
                                <input type="checkbox" name="permisos[]" value="{{ $permiso->name }}"
                                    @checked($rol->permissions->contains($permiso->id))>
                                <span>{{ $permiso->description }}</span>
                                <br>
                            @endforeach

                            <div class="sm:col-span-6 pt-5">
                                <button type="submit"
                                    class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="mt-6 p-2 bg-slate-100">
                    <h2 class="text-2xl font-semibold">Rol Permisos</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($rol->permissions)
                            @foreach ($rol->permissions as $rol_permiso)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" method="POST"
                                    action="{{ route('admin.roles.permisos.revocar', [$rol->id, $rol_permiso->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $rol_permiso->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl mt-6">
                        <form method="POST" action="{{ route('admin.roles.permisos.dar', $rol->id) }}">
                            @csrf
                            <div class="sm:col-span-6">
                                <label for="permission" class="block text-sm font-medium text-gray-700">Permiso</label>
                                <select id="permiso" name="permiso" autocomplete="permiso-name"
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($permisos as $permiso)
                                        <option value="{{ $permiso->name }}">{{ $permiso->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Asignar
                            Permiso</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-admin-layout>
