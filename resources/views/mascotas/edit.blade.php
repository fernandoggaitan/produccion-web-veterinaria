<x-base :title="$mascota->nombre">

    <x-h1> {{ __('pets.title_edit') }} </x-h1>

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="mx-auto" action="{{ route('mascotas.update', $mascota) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5 group">
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('pets.form_save.one') }} </label>
                <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre de la mascota" value="{{ old('nombre', $mascota->nombre) }}">
            </div>
        </div>
        <div class="mb-5 group">
            <div class="mb-5">
                <label for="fecha_nacimiento" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('pets.form_save.two') }} </label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old('fecha_nacimiento', $mascota->fecha_nacimiento) }}">
            </div>
        </div>
        <div class="mb-5 group">
            <div class="mb-5">
                <label for="categoria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('pets.form_save.three') }} </label>
                <select name="categoria_id" id="categoria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value=""> Seleccione </option>
                    @foreach ($categorias as $categoria)
                        <option @selected( old('categoria_id', $mascota->categoria_id) == $categoria->id) value="{{ $categoria->id }}"> {{ $categoria->nombre }} </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="mb-5 group">
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> {{ __('pets.form_save.four') }} </label>
            <textarea name="descripcion" id="descripcion" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Características de la mascota">{{ old('descripcion', $mascota->descripcion) }}</textarea>
        </div>
        <div>
            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"> {{ __('pets.btn_update') }} </button>
            <x-btn-primary :href="route('mascotas.index')"> {{ __('pets.btn_back') }} </x-btn-primary>
        </div>
    </form>


</x-base>
