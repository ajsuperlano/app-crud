<x-table>
    @if (count($clients))

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500 "
                        wire:click="order('name')">
                        <div class="flex items-center justify-center">
                            Nombre
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r text-sm font-thin text-gray-500 cursor-pointer"
                        wire:click="order('dni')">
                        <div class="flex items-center justify-center">
                            Documento de identidad
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r  text-sm font-thin text-gray-500 cursor-pointer"
                        wire:click="order('category_id')">
                        <div class="flex items-center justify-center">
                            Categoria
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>

                    <th>Acciones </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $item)
                    <tr class="bg-gray-50 text-center">
                        <td class="p-2 border-r">{{ $item->name }}</td>
                        <td class="p-2 border-r">{{ $item->dni }} </td>
                        <td class="p-2 border-r">{{ $item->category->name }} </td>
                        <td class="p-2 bottom-r flex">
                            <button type="button"
                                class=" m-1 bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin"
                                wire:click="$emit('deleteClients',{{ $item->id }})">Eliminar</button>
                            <button type="button"
                                class=" m-1 bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin"
                                wire:click="read({{ $item }})">ver</button>
                            <button type="button"
                                class=" m-1 bg-gray-500 p-2 text-white hover:shadow-lg text-xs font-thin"
                                wire:click="edit({{ $item }})">Editar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($clients->hasPages(2))
            <div class="px-6 py-4">
                {{ $clients->links() }}
            </div>
        @endif
    @else
        <div class="px-4 py-4">
            No hay ning??n registro asociado.
        </div>
    @endif

    <!-- component -->

</x-table>

