<div>

    <x-slot name="header">
        <h2>Lista de Productos</h2>
        <x-boton-ir-carrito href="{{ route('admin.productos.crear') }}">
            Agregar producto
        </x-boton-ir-carrito>
    </x-slot>
    <div class="container py-12">

        <x-tabla-responsiva>

            <div class="px-6 py-4">

                <x-jet-input type="text" wire:model="buscarProducto" class="w-full"
                    placeholder="Ingrese el nombre del procucto que quiere buscar" />

            </div>

            @if ($productos->count())

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Categoría
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Estado
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Precio
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Editar</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">

                        @foreach ($productos as $producto)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            @if ($producto->imagenes->count())
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="{{ Storage::url($producto->imagenes->first()->url) }}"
                                                    alt="">
                                            @else
                                                <img class="h-10 w-10 rounded-full object-cover"
                                                    src="https://images.pexels.com/photos/4883800/pexels-photo-4883800.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                                    alt="">
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $producto->nombre }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm text-gray-900">
                                        {{ $producto->subcategoria->categoria->nombre }}
                                    </div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @switch($producto->estado)
                                        @case(1)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                Borrador
                                            </span>
                                        @break

                                        @case(2)
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Publicado
                                            </span>
                                        @break

                                        @default
                                    @endswitch

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    {{ $producto->precio }} USD
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.productos.editar', $producto) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
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

            @if ($productos->hasPages())
                <div class="px-6 py-4">
                    {{ $productos->links() }}
                </div>
            @endif


        </x-tabla-responsiva>
    </div>
</div>
