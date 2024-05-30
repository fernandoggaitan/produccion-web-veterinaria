<x-base :title="$mascota->nombre">

    <x-h1> {{ $mascota->nombre }} </x-h1>

    <div class="mb-3">
        {{ $mascota->descripcion }}
    </div>

    <div>
        <x-btn-primary href="{{ route('mascotas.index') }}"> Volver al panel </x-btn-primary>
        <x-btn-primary href="{{ route('mascotas.edit', $mascota) }}"> Editar mascota </x-btn-primary>
        <x-btn-primary href="{{ route('mascotas.index') }}"> Eliminar mascota </x-btn-primary>
    </div>

</x-base>
