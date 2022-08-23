<x-app-layout>
    @section('tituloPagina', 'Inicio2')

    <x-slider-principal :sliders="$sliders" />

    <div>
        @foreach ($categorias as $categoria)
            <section>
                <h1>{{ $categoria->nombre }}</h1>
                <a href="{{ route('categorias.show', $categoria) }}">Ver más</a>

                @livewire('frontend.categoria-productos', ['categoria' => $categoria])

            </section>
        @endforeach
    </div>
    @push('script')
        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-' + id), {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: '#dots',
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                        breakpoint: 640,
                        settings: {
                            slidesToShow: 2.5,
                            slidesToScroll: 2,
                        }
                    }, {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3.5,
                            slidesToScroll: 3,
                        }
                    }, {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4.5,
                            slidesToScroll: 4,
                        }
                    }]
                });
            })
        </script>
    @endpush

</x-app-layout>
