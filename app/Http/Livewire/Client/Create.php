<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;

trait Create
{
    public function create()
    {
        $this->client      = new Client();
        $this->open_modal   = true;
        $this->action       = 'create';
    }

    public function store()
    {
        // dd($this->client->name);
        $this->validate();
        $this->client->status  = 1;
        $this->client->save();
        $this->default();
        $this->alert('El Cliente se creó correctamente.');
    }
}
