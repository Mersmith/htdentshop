<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block">
                <span class="monto_total">$0.00</span>
                @if (Cart::count())
                    <p>{{ Cart::count() }} </p>
                @endif
                <i class="fa-solid fa-cart-shopping" style="color: #666666;"></i>
                {{-- <x-icono-carrito ancho="35" />
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span> --}}
            </span>
        </x-slot>



        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <li>
                        <img class="h-15 x-20 object-cover mr-4" src="{{ $item->options->imagen }}" alt="">
                        <article>
                            <h1>{{ $item->name }}</h1>
                            <p>Cant: {{ $item->qty }} </p>
                            <p>USD {{ $item->price }} </p>
                            @isset($item->options['color'])
                                <p>color: {{ $item->options['color'] }} </p>
                            @endisset
                            @isset($item->options['medida'])
                                <p>Medida: {{ $item->options['medida'] }} </p>
                            @endisset
                        </article>
                    </li>
                @empty
                    <div>
                        <p>No eligió ningún producto :( .</p>
                    </div>
                @endforelse
            </ul>
            @if (Cart::count())
                <div>
                    <p>Total: USD {{ Cart::subtotal() }} </p>
                </div>
                <div>
                    <x-boton-ir-carrito href="{{route('carrito-compras')}}">
                        Ir al carrito
                    </x-boton-ir-carrito>
                </div>
            @endif

        </x-slot>

        
    </x-jet-dropdown>
</div>
