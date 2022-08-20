<x-app-layout>
    <div>
        <h1></h1>
        <div>
            {{ $categorias->first()->nombre }}
        </div>
        @livewire('categoria-productos', ['categoria' => $categorias->first()])
    </div>
    @push('script')
        <script>
            Livewire.on('glider', function() {
                new Glider(document.querySelector('.glider'), {
                    slidesToShow: 5,
                    dots: '#dots',
                    draggable: true,
                    dots: '.dots',
                    arrows: {
                        prev: '.glider-prev',
                        next: '.glider-next'
                    }
                });
            })
        </script>
    @endpush
</x-app-layout>
