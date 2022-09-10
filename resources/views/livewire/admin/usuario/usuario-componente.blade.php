<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>

    <div class="container py-12">
        <x-tabla-responsiva>

            <div class="px-6 py-4">

                <x-jet-input wire:model="buscar" type="text" class="w-full" placeholder="Escriba algo para filtrar" />

            </div>

            {{-- Pregunta la cantidad de usuarios, si tiene o no. --}}
            @if (count($usuarios))

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Email
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rol
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Eliminar
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($usuarios as $usuario)
                            {{-- Mejor seguimiento para Livewire con un key unico --}}
                            <tr wire:key="{{ $usuario->email }}">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-gray-900">
                                        {{ $usuario->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{ $usuario->name }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $usuario->email }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <div class="text-sm text-gray-900">

                                        @if (count($usuario->roles))
                                            Admin
                                        @else
                                            No tiene rol
                                        @endif

                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">

                                    <label>
                                        {{-- Preguntamos si el usuario tiene algun rol --}}
                                        <input {{ count($usuario->roles) ? 'checked' : '' }} value="1"
                                            type="radio" name="{{ $usuario->email }}" {{-- Se pasa al evente asignarRol el id y el valor del input --}}
                                            wire:change="asignarRol({{ $usuario->id }}, $event.target.value)">
                                        Si
                                    </label>

                                    <label class="ml-2">
                                        <input {{ count($usuario->roles) ? '' : 'checked' }} value="0"
                                            type="radio" name="{{ $usuario->email }}"
                                            wire:change="asignarRol({{ $usuario->id }}, $event.target.value)">
                                        No
                                    </label>
                                    |
                                    <a href="{{ route('admin.usuarios.editar', $usuario) }}">Editar</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('admin.usuarios.show', $usuario->id) }}"
                                        class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Roles</a>
                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md"
                                        method="POST" action="{{ route('admin.usuarios.destroy', $usuario->id) }}"
                                        onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        <!-- More people... -->


                    </tbody>
                </table>
            @else
                <div class="px-6 py-4">
                    No hay ningún registro coincidente
                </div>
            @endif

            @if ($usuarios->hasPages())
                <div class="px-6 py-4">
                    {{ $usuarios->links() }}
                </div>
            @endif
        </x-tabla-responsiva>
    </div>
</div>
