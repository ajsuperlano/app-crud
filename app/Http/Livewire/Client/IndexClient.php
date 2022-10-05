<?php

namespace App\Http\Livewire\Client;

use App\Models\Category;
use App\Models\Client;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;


class IndexClient extends Component
{
    use WithPagination;
    use Create, Edit;

    public $client,  $action;

    public $cant        = '10';
    public $search      = '';
    public $sort        = 'name';
    public $direction   = 'desc';
    public $open_modal  = false;
    public $readyToLoad = false;
    public $categories  = [];

    protected $listeners       = ['ShowsRender' => 'render', 'deleteClient' => 'delete'];
    protected $paginationTheme = 'bootstrap';

    protected $queryString     = [
        'cant' => ['except' => '10'],
        'sort' => ['except' => 'name'],
        'direction' => ['except' => 'desc'],
        'search' => ['except' => ''],
    ];

    protected $rules = [
        'client.name'   => 'required|string|max:100',
        'client.dni'    => 'required',
        'client.tlf'    => 'required|numeric',
        'client.category_id'    => 'required',
    ];

    public function mount()
    {
        $this->categories  =  Category::all();
        $this->client = new Client;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {


        if ($this->readyToLoad) {
            $clients = Client::where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate($this->cant);
        } else {
            $clients = [];
        }
        return view('livewire.client.index', compact('clients'));
    }

    public function loadClients()
    {
        $this->readyToLoad = true;
    }

    public function order($sort)
    {
        if ($this->sort == $sort) :
            $this->direction = ($this->direction == 'desc') ? 'asc' : 'desc';
        else :
            $this->direction = 'asc';
            $this->sort = $sort;
        endif;
    }

    public function alert($mensaje)
    {
        $this->emit('alert', $mensaje);
    }

    public function default()
    {
        $this->reset(['open_modal']);
        $this->emit('ShowsRender');
    }
}
