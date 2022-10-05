<div class="col-md-6">
    <style>
        .list-group-item {
            width: 375px;

        }

        .search-results {
            position: absolute
        }
    </style>

    <label for="name" class="form-label">Cliente : {{ $client }}</label>
    <x-jet-input type="text" class='form-control' placeholder="Buscar Cliente" wire:model="search" />

    <div class="search-results">
        @foreach ($clients as $_client)
            <div class="list-group-item" wire:click="selectClient({{ $_client }})">
                {{ $_client->name }}<br>
                {{ $_client->dni }},TFL:
                {{ $_client->tlf }}
            </div>
        @endforeach

    </div>

</div>
