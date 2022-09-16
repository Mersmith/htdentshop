<div>
    <h2>Cupones</h2>
    <div>
        <a href="{{ route('admin.cupones.agregar') }}">Agregar Nuevo</a>
    </div>
    @if (Session::has('message'))
        <div>{{ Session::get('message') }} </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Codigo Cupon</th>
                <th>Tipo</th>
                <th>Descuento</th>
                <th>Monto Carrito</th>
                <th>Expiración</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cupones as $cupon)
                <tr>
                    <td>
                        {{ $cupon->id }}
                    </td>
                    <td>
                        {{ $cupon->codigo }}
                    </td>
                    <td>
                        {{ $cupon->tipo }}
                    </td>

                    @if ($cupon->tipo == 'fijo')
                        <td>
                            {{ $cupon->descuento }}USD
                        </td>
                    @else
                        <td>
                            {{ $cupon->descuento }}%
                        </td>
                    @endif
                    <td>
                        {{ $cupon->carrito_monto }}
                    </td>
                    <td>
                        {{ $cupon->fecha_expiracion }}
                    </td>
                    <td>
                        <a href="{{ route('admin.cupones.editar', ['cupon' => $cupon->id]) }}"> <i
                                class="fa fa-edit fa-2x"></i> </a>
                        <a href="#" onclick="confirm('Quieres eliminar?') || event.stopInmediatePropagation()"
                            wire:click.prevent='"eliminarCupon({{ $cupon->id }})'> Eliminar </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>
                        <p>No hay</p>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
