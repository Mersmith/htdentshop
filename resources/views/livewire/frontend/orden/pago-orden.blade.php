<div>
    <?php
    // SDK de Mercado Pago
    require base_path('vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));
    
    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();
    $shipments = new MercadoPago\Shipments();
    
    $shipments->cost = $orden->costo_envio;
    $shipments->mode = 'not_specified';
    $preference->shipments = $shipments;
    
    // Crea un ítem en la preferencia
    foreach ($productosCarrito as $producto) {
        $item = new MercadoPago\Item();
        $item->title = $producto->name;
        $item->quantity = $producto->qty;
        $item->unit_price = $producto->price;
    
        $productos[] = $item;
    }
    
    $preference->back_urls = [
        'success' => route('orden.pago', $orden),
        'failure' => 'http://www.tu-sitio/failure',
        'pending' => 'http://www.tu-sitio/pending',
    ];
    $preference->auto_return = 'approved';
    
    $preference->items = $productos;
    $preference->save();
    
    /*$item = new MercadoPago\Item();
                $item->title = 'Mi producto';
                $item->quantity = 1;
                $item->unit_price = 75.56;
                $preference->items = [$item];
                $preference->save();*/
    
    ?>


    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <h2>Hola 2</h2>
        <div class="bg-white rounded-lg shadow-lg px-12 py-8 mb-6 flex items-center">

            <div class="relative">
                <div
                    class="{{ $orden->estado >= 2 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div
                class="{{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
            </div>

            <div class="relative">
                <div
                    class="{{ $orden->estado >= 3 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>

                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>

            <div
                class="{{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2">
            </div>

            <div class="relative">
                <div
                    class="{{ $orden->estado >= 4 && $orden->estado != 5 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-2 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>

        </div>




        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-{{ $orden->id }}</p>

            @if ($orden->estado == 1)
                <x-boton-ir-carrito class="ml-auto" href="#">
                    Ir a pagar
                </x-boton-ir-carrito>
            @endif
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class="text-lg font-semibold uppercase">Envío</p>

                    @if ($orden->tipo_envio == 1)
                        <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                        <p class="text-sm">Calle falsa 123</p>
                    @else
                        <p class="text-sm">Los productos Serán enviados a:</p>
                        <p class="text-sm">{{ $envio->direccion }}</p>
                        <p>{{ $envio->departamento }} - {{ $envio->ciudad }} - {{ $envio->distrito }}
                        </p>
                    @endif


                </div>

                <div>
                    <p class="text-lg font-semibold uppercase">Datos de contacto</p>

                    <p class="text-sm">Persona que recibirá el producto: {{ $orden->contacto }}</p>
                    <p class="text-sm">Teléfono de contacto: {{ $orden->celular }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($productosCarrito as $item)
                        <tr>
                            <td>
                                <div class="flex">
                                    <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->imagen }}"
                                        alt="">
                                    <article>
                                        <h1 class="font-bold">{{ $item->name }}</h1>
                                        <div class="flex text-xs">

                                            @isset($item->options->color)
                                                Color: {{ __($item->options->color) }}
                                            @endisset

                                            @isset($item->options->medida)
                                                - {{ $item->options->medida }}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>

                            <td class="text-center">
                                {{ $item->price }} USD
                            </td>

                            <td class="text-center">
                                {{ $item->qty }}
                            </td>

                            <td class="text-center">
                                {{ $item->price * $item->qty }} USD
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <p> Subtotal:{{ $orden->total - $orden->costo_envio }} </p>
            <p> Envio:{{ $orden->costo_envio }} </p>
            <p> Total:{{ $orden->total }} USD </p>
            <div class="cho-container"></div>
        </div>
    </div>
    {{-- SDK MercadoPago.js V2 --}}
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        const mp = new MercadoPago("{{ config('services.mercadopago.key') }}", {
            locale: 'es-PE'
        });

        mp.checkout({
            preference: {
                id: '{{ $preference->id }}'
            },
            render: {
                container: '.cho-container',
                label: 'Pagar',
            }
        });
    </script>
</div>
