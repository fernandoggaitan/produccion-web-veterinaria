<x-base title="Mascotas">

    <x-h1> {{ __('pets.title_index') }} </x-h1>

    @if (Session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
            role="alert"> {{ Session('status') }} </div>
    @endif

    <div class="my-3">
        <x-btn-primary :href="route('mascotas.create')"> {{ __('pets.btn_add') }} </x-btn-primary>
    </div>
    
    <form class="flex items-center max-w-sm mx-auto mb-3">
        <label for="buscador" class="sr-only">Search</label>
        <div class="relative w-full">
            <input type="text" name="buscador" id="buscador" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required value="{{ $buscador }}" />
        </div>
        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
            <span class="sr-only">Search</span>
        </button>
        @if ($buscador)        
            <a href="{{ route('mascotas.index') }}" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                </svg>
                <span class="sr-only">Clear</span>
            </a>
        @endif
    </form>

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
                            <x-btn-primary href="{{ route('mascotas.show', $mascota) }}"> {{ __('pets.btn_manage') }}
                            </x-btn-primary>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $mascotas->links() }}

    </div>

</x-base>