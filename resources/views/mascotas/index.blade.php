<x-base title="Mascotas">

    <x-h1> Lista de mascotas </x-h1>

    <div class="my-3">
        <x-btn-primary :href="route('mascotas.create')"> Agregar mascota </x-btn-primary>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha de nacimiento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Categoría
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
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
                            <x-btn-primary href=""> Gestionar mascota </x-btn-primary>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $mascotas->links() }}

    </div>


</x-base>
