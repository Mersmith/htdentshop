{{-- Policy Producto --}}
@can('productoComprado', $producto)
    <div>
        <h2>Dejar Reseña</h2>
        <form action="{{ route('resenas.store', $producto) }}" method="POST">
            @csrf
            <textarea name="comentario" id="editor" cols="30" rows="10"></textarea>
            <x-jet-input-error for="comentario" />

            <div class="flex items-center mt-2" x-data="{ rating: 5 }">
                <p class="font-semibold mr-3">Puntaje:</p>
                <ul class="flex space-x-2">
                    <li x-bind:class="rating >= 1 ? 'text-yellow-500' : ''">
                        <button type="button" class="focus:outline-none" x-on:click="rating = 1">
                            <i class="fas fa-star"></i>
                        </button>
                    </li>
                    <li x-bind:class="rating >= 2 ? 'text-yellow-500' : ''">
                        <button type="button" class="focus:outline-none" x-on:click="rating = 2">
                            <i class="fas fa-star"></i>
                        </button>
                    </li>
                    <li x-bind:class="rating >= 3 ? 'text-yellow-500' : ''">
                        <button type="button" class="focus:outline-none" x-on:click="rating = 3">
                            <i class="fas fa-star"></i>
                        </button>
                    </li>
                    <li x-bind:class="rating >= 4 ? 'text-yellow-500' : ''">
                        <button type="button" class="focus:outline-none" x-on:click="rating = 4">
                            <i class="fas fa-star"></i>
                        </button>
                    </li>
                    <li x-bind:class="rating >= 5 ? 'text-yellow-500' : ''">
                        <button type="button" class="focus:outline-none" x-on:click="rating = 5">
                            <i class="fas fa-star"></i>
                        </button>
                    </li>
                </ul>
                <input name="puntaje" class="hidden" type="number" x-model="rating">

            </div>
            <x-jet-button class="ml-auto">
                Agregar reseña
            </x-jet-button>
        </form>
    </div>
@endcan
