<x-base title="Mascotas">

    <x-h1> {{ __('pets.title_index') }} </x-h1>

    @if (Session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert"> {{ Session('status') }} </div>
    @endif

    <div class="my-3">
        <x-btn-primary :href="route('mascotas.create')"> {{ __('pets.btn_add') }} </x-btn-primary>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        {{ __('pets.table_colums.one') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('pets.table_colums.two') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('pets.table_colums.three') }}
                    </th>
                    <th scope="col" class="px-6 py-3">
                        {{ __('pets.table_colums.four') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mascotas as $mascota)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $mascota->nombre }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $mascota->fecha_nacimiento }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $mascota->categoria->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            <x-btn-primary href="{{ route('mascotas.show', $mascota) }}"> {{ __('pets.btn_manage') }} </x-btn-primary>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $mascotas->links() }}

    </div>


</x-base>
