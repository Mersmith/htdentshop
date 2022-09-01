<div class="container py-8 grid lg:grid-cols-2 xl:grid-cols-5 gap-6">
<h2>hola 1</h2>
    <div class="order-2 lg:order-1 lg:col-span-1 xl:col-span-3">

        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-jet-label value="Nombre de contácto" />
                <x-jet-input type="text" wire:model.defer="contacto"
                    placeholder="Ingrese el nombre de la persona que recibirá el producto" class="w-full" />
                <x-jet-input-error for="contacto" />
            </div>

            <div>
                <x-jet-label value="Teléfono de contacto" />
                <x-jet-input type="text" wire:model.defer="celular"
                    placeholder="Ingrese un número de telefono de contácto" class="w-full" />

                <x-jet-input-error for="celular" />
            </div>
        </div>

        {{-- tipo_envio: Es una variable de alpine --}}
        {{-- entangle: Toma la variable del livewire --}}
        <div x-data="{ tipo_envio: @entangle('tipo_envio') }">
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envíos</p>

            <label class="bg-white rounded-lg shadow px-6 py-4 flex items-center mb-4 cursor-pointer">
                <input x-model="tipo_envio" type="radio" value="1" name="tipo_envio" class="text-gray-600">
                <span class="ml-2 text-gray-700">
                    Recojo en tienda (Calle Falsa 123)
                </span>

                <span class="font-semibold text-gray-700 ml-auto">
                    Gratis
                </span>
            </label>

            <div class="bg-white rounded-lg shadow">
                <label class="px-6 py-4 flex items-center cursor-pointer">
                    <input x-model="tipo_envio" type="radio" value="2" name="tipo_envio" class="text-gray-600">
                    <span class="ml-2 text-gray-700">
                        Envío a domicilio
                    </span>

                </label>

                {{-- class: Clase dinamica de alpine --}}
                <div class="px-6 pb-6 grid grid-cols-2 gap-6 hidden" :class="{ 'hidden': tipo_envio != 2 }">

                    {{-- Departamentos --}}
                    <div>
                        <x-jet-label value="Departamento" />

                        <select class="form-control w-full" wire:model="departamento_id">

                            <option value="" disabled selected>Seleccione un Departamento</option>

                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="departamento_id" />
                    </div>

                    {{-- Ciudades --}}
                    <div>
                        <x-jet-label value="Ciudad" />

                        <select class="form-control w-full" wire:model="ciudad_id">

                            <option value="" disabled selected>Seleccione una ciudad</option>

                            @foreach ($ciudades as $ciudad)
                                <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="ciudad_id" />
                    </div>


                    {{-- Distritos --}}
                    <div>
                        <x-jet-label value="Distrito" />

                        <select class="form-control w-full" wire:model="distrito_id">

                            <option value="" disabled selected>Seleccione un distrito</option>

                            @foreach ($distritos as $distrito)
                                <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                            @endforeach
                        </select>

                        <x-jet-input-error for="distrito_id" />
                    </div>

                    <div>
                        <x-jet-label value="Dirección" />
                        <x-jet-input class="w-full" wire:model="direccion" type="text" />
                        <x-jet-input-error for="direccion" />
                    </div>

                    <div class="col-span-2">
                        <x-jet-label value="Referencia" />
                        <x-jet-input class="w-full" wire:model="referencia" type="text" />
                        <x-jet-input-error for="referencia" />
                    </div>

                </div>
            </div>

        </div>

        <div>
            <x-jet-button wire:loading.attr="disabled" wire:target="crearOrden" class="mt-6 mb-4"
                wire:click="crearOrden">
                Continuar con la compra
            </x-jet-button>

            <hr>

            <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam atque
                quo, labore facere placeat illo consequatur hic ut sapiente exercitationem, architecto iure,
                consequuntur impedit ex iusto ipsa voluptas laudantium iste <a href=""
                    class="font-semibold text-orange-500">Políticas y privacidad</a></p>
        </div>

    </div>

    <div class="order-1 lg:order-2 lg:col-span-1 xl:col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $itemCarrito)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $itemCarrito->options->imagen }}"
                            alt="">

                        <article class="flex-1">
                            <h1 class="font-bold">{{ $itemCarrito->name }}</h1>

                            <div class="flex">
                                <p>Cant: {{ $itemCarrito->qty }}</p>
                                @isset($itemCarrito->options['color'])
                                    <p class="mx-2">- Color: {{ __($itemCarrito->options['color']) }}</p>
                                @endisset

                                @isset($itemCarrito->options['medida'])
                                    <p>{{ $itemCarrito->options['medida'] }}</p>
                                @endisset

                            </div>

                            <p>USD {{ $itemCarrito->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-700">
                            No tiene agregado ningún item en el carrito
                        </p>
                    </li>
                @endforelse
            </ul>

            <hr class="mt-4 mb-3">

            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal
                    <span class="font-semibold">{{ Cart::subtotal() }} USD</span>
                </p>
                <p class="flex justify-between items-center">
                    Envío
                    <span class="font-semibold">
                        @if ($tipo_envio == 1 || $costo_envio == 0)
                            Gratis
                        @else
                            {{ $costo_envio }} USD
                        @endif
                    </span>
                </p>

                <hr class="mt-4 mb-3">

                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total</span>
                    @if ($tipo_envio == 1)
                        {{ Cart::subtotal() }} USD
                    @else
                        {{ Cart::subtotal() + $costo_envio }} USD
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
