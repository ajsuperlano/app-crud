<?php

namespace App\Http\Livewire\Client;


use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;


class Lists extends Component
{

    public $client      = '';
    public $search      = '';
    public $readyToLoad = true;

    public function render()
    {

        if (strlen($this->search) >= 2) {
            $clients = Client::where('name', 'like', '%' . $this->search . '%')
                ->paginate(10);
        } else {
            $clients = [];
        }
        return view('livewire.client.list', compact('clients'));
    }

    public function selectClient(Client $client)
    {

        $this->client = $client->name .  ' ' . $client->dni . ' ' . $client->tfl;
        $this->search = '';
        $this->emit('addClient', $client->id);
    }
}
