<div class="row justify-content-center my-5">
    <div class="col-md-12">
        <div class="card shadow bg-light">
            <div class="card-body bg-white px-5 py-3 border-bottom rounded-top">
                <div class="mx-3 my-3 ">

                    <h3 class=" my-4">
                        Listado de Clientes
                    </h3>

                    <div wire:init="loadClients">

                        <div class="flex  ms-auto ">
                            <div class="col-2 flex align-items-center">
                                <span>Mostrar</span>
                                <select class="form-control mx-2" wire:model="cant">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span>Entradas</span>
                            </div>
                            <div class="flex-1 mx-4">

                                <x-jet-input type="text" class='w-full' placeholder="busqueda" wire:model="search" />
                            </div>

                            {{-- @livewire('client.create') --}}
                            <x-jet-button wire:click="create()">
                                Nuevo Cliente
                            </x-jet-button>
                        </div>

                        @include('livewire.client.components.table')
                        @include('livewire.client.components.form')




                        @push('scripts')
                            <script>
                                Livewire.on('deleteClients', ClientId => {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            Livewire.emit('deleteClient', ClientId);
                                            Swal.fire(
                                                'Deleted!',
                                                'Your file has been deleted.',
                                                'success'
                                            )
                                        }
                                    })
                                });
                            </script>
                        @endpush
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- component -->
