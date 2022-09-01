<x-app-layout>
    <div class="container py-8">
        <ul>
            @forelse($productos as $producto)
                <x-lista-productos :producto="$producto" />

            @empty
            
                <li class="bg-white rounded-lg shadow-2xl">
                    <div class="p-4">
                        <p class="text-lg font-semibold text-gray-700">
                            Ningún producto coinide con esos parametros
                        </p>
                    </div>
                </li>

            @endforelse
        </ul>

        <div class="mt-4">
            {{$productos->links()}}
        </div>
    </div>
</x-app-layout>