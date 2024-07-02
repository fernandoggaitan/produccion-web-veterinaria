<x-base title="Mascotas">

    <x-h1> Servicios </x-h1>

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
                    <x-btn-primary href="#">                        
                        Agregar
                        ${{ $servicio->precio_format() }}
                    </x-btn-primary>
                </div>
            </div>
        @endforeach
    </div>

</x-base>
