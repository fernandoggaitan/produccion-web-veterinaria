<x-base title="Mascotas">

    <x-h1> Servicios </x-h1>

    @if (Session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert"> {{ Session('status') }} </div>
    @endif

    <div class="mb-5">
        <x-btn-primary href="{{ route('cart.index') }}">
            Ver carrito
        </x-btn-primary>
    </div>

    <div class="grid grid-cols-1 gap-3 lg:grid-cols-4 md:grid-cols-2 sm:grid-col-1">
        @foreach ($servicios as $servicio)
            <div
                class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="p-8 rounded-t-lg block mx-auto" src="{{ asset('storage/categorias/' . $servicio->categoria_id) }}.png" alt="product image" />
                </a>
                <div class="px-5 pb-5">
                    <h2 class="text-3xl font-semibold tracking-tight text-gray-900 dark:text-white mb-3">
                        {{ $servicio->nombre }}
                    </h2>
                    @isset($cart[$servicio->id])
                        <a href="{{ route('cart.index') }}"> Item agregado / Ver carrito </a>
                    @else
                        <form action="{{ route('cart.update', $servicio->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="number" name="cantidad" value="1" />
                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                Agregar
                                ${{ $servicio->precio_format() }}
                            </button>
                        </form>
                    @endisset                    
                </div>
            </div>
        @endforeach
    </div>

</x-base>
