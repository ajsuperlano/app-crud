<x-jet-dialog-modal wire:model="open_modal" maxWidth="lg" id="Modal-2">
    <x-slot name='title'>
        @if ($action == 'create')
            Nuevo Cliente
        @elseif($action == 'edit')
            Editar el Cliente {{ $client->name }}
        @endif
    </x-slot>
    <x-slot name='content'>

        <form>
            <fieldset class="mx-3 flex flex-wrap" @if ($action == 'read') disabled @endif>
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nombre
                        </label>
                        <input type="text"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            @error('client.name') is-invalid @enderror" id="name" wire:model.defer="client.name"
                            placeholder="Nombre">
                        <x-jet-input-error for="client.name" />
                    </div>
                </div>



                <div class="w-full px-3 sm:w-1/2">

                    <div class="mb-5">

                        <label for="dni" class="mb-3 block text-base font-medium text-[#07074D]">Documento de
                            identidad</label>
                        <input type="text"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            @error('client.dni') is-invalid @enderror" id="dni" wire:model.defer="client.dni"
                            placeholder="Documento de identidad">
                        <x-jet-input-error for="client.dni" />

                    </div>
                </div>
                <div class="w-full px-3 sm:w-1/2">

                    <div class="mb-5">
                        <label for="tfl" class="mb-3 block text-base font-medium text-[#07074D]">Teléfono</label>
                        <input type="text"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                            @error('client.tlf') is-invalid @enderror" id="tlf" wire:model.defer="client.tlf"
                            placeholder="Teléfono">
                        <x-jet-input-error for="client.tlf" />
                    </div>
                </div>
                <div class="w-full px-3 " wire:ignore>
                    <div class="mb-5">
                        <label for="" class="mb-3 block text-base font-medium text-[#07074D]">
                            Categoria
                        </label>

                    </div>
                    <select class="js-select w-full" name="gategory_id"  id="category_id" wire:model="client.category_id"  >
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"> {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </fieldset>
        </form>
    </x-slot>
    <x-slot name='footer'>
        <div class="flex-fill flex justify-content-between ">
            <div class="d-block">
                <x-jet-secondary-button class=" m-1 bg-gray-500 p-2 text-white hover:shadow-lg text-xs font-thin"
                    wire:click="$toggle('open_modal')">
                    Cancelar
                </x-jet-secondary-button>

            </div>
            <div class="d-block">
                @if ($action == 'create')
                    <button type="button"
                        class=" m-1 bg-blue-500 p-2  rounded-md text-white hover:shadow-lg text-xs font-thin"
                        wire:loading.remove wire:target="save,update" wire:click="store">Crear Cliente</button>
                @elseif($action == 'edit')
                    <button type="button"
                        class=" m-1 bg-blue-500 p-2  rounded-md text-white hover:shadow-lg text-xs font-thin"
                        wire:loading.remove wire:target="save,update" wire:click="update">Actualizar</button>
                @elseif($action == 'read')
                @endif
            </div>
            <span wire:loading wire:target="update,store"> Cargando...</span>
        </div>

    </x-slot>

</x-jet-dialog-modal>
