<div class="flex-1 relative" x-data>
    
    <form action="{{ route('buscar') }}" autocomplete="off">

        <x-jet-input name="name" wire:model="busqueda" type="text" class="w-full" placeholder="¿Estás buscando algún producto?" />

        <button class="absolute top-0 right-0 w-12 h-full bg-orange-500 flex items-center justify-center rounded-r-md">
            <x-buscar size="35" color="white" />
        </button>

    </form>

    <div class="absolute w-full mt-1 hidden" :class="{ 'hidden' : !$wire.abierto }" @click.away="$wire.abierto = false">
        <div class="bg-white rounded-lg shadow-lg">
            <div class="px-4  py-3 space-y-1">
                @forelse ($productos as $producto)
                    <a href="{{ route('producto.mostrar', $producto) }}" class="flex">
                        <img class="w-16 h-12 object-cover" src="{{ Storage::url($producto->imagenes->first()->url) }}" alt="">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{$producto->nombre}}</p>
                            <p>Categoria: {{$producto->subcategoria->categoria->nombre}}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-lg leading-5">
                        No existe ningún registro con los parametros especificados
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
