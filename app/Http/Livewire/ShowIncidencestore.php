<?php

namespace App\Http\Livewire;

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

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.show-incidencestore');
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
