<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;

trait Edit
{
    public function edit(Client $client)
    {
        $this->client       = $client;
        $this->open_modal   = true;
        $this->action       = 'edit';
    }


    public function update()
    {
        $this->validate();

        $this->client->save();

        $this->reset(['open_modal']); //'name', 'description', 'price', 'purchase', 'wholesale', 'stock', 'stock', 'image']);
        $this->emit('ShowsRender');
        $this->emit('alert', 'El Cliento se Actualizó correctamente.');
    }

    public function read(Client $client)
    {
        $this->client      = $client;
        $this->open_modal   = true;
        $this->action       = 'read';
    }

    public function delete(Client $client)
    {
        // $client->delete();
    }
}
