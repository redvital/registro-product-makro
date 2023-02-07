<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Statu;
use Livewire\Component;
use Livewire\WithPagination;

class ShowIncidencestore extends Component
{
    protected $paginationTheme = "bootstrap";
    use WithPagination;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $store;
    public $statuses;
    public $statuFilter;

    public function mount()
    {
        $this->statuses = Statu::all();
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }



    public function render()
    {
        $products = $this->store->products()
            ->when($this->statuFilter, function($query){
                $query->where('status_id', $this->statuFilter);
            })->paginate(10);
        return view('livewire.show-incidencestore', compact('products'));
    }
    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }

        $this->sort = $sort;
    }
}
