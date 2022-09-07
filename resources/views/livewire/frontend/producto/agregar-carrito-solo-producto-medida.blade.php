<div x-data>
    <p>PRODUCTO solO MEDIDA</p>

    <table class="text-gray-600">
        <thead class="border-b border-gray-300">
            <tr class="text-left">
                <th class="py-2">Nombre</th>
                <th class="py-2"></th>
                <th class="py-2"></th>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-300">
            @foreach ($medidas as $itemMedida)
                <tr x-data="aumentarCantidad(), cantidad">
                    <td class="py-2">
                        <a class="uppercase">
                            {{ $itemMedida->nombre }}
                            {{ $itemMedida->colores->first()->pivot->cantidad }}
                        </a>
                    </td>

                    <td class="py-2">
                        <div>
                            <button x-on:click="disminuir()">-</button>
                            <span x-text="cantidad"></span>
                            <button x-on:click="incrementar()">+</button>
                        </div>
                    </td>

                    <td class="py-2">
                        <x-boton-agregar x-on:click="$wire.agregarProducto({{ $itemMedida->id }}, cantidad)">
                            Agregar al carrito
                        </x-boton-agregar>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    var cantidad = 1;

    function aumentarCantidad() {
        return {
            cantidad: cantidad,

            disminuir() {
                this.cantidad--;
            },
            incrementar() {
                this.cantidad++;
            }
        };
    }
</script>