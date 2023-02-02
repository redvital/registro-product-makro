<?php

namespace App\Http\Livewire;

use App\Models\Authorization;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAuthorization extends Component
{

    protected $paginationTheme = "bootstrap";
    use WithPagination;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $authorizations = Authorization::where('user_id', 'like', '%' . $this->search . '%')
            ->where('store_id', 'like', '%' . $this->search . '%')
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);
        return view('livewire.show-authorization', compact('authorizations'));


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
