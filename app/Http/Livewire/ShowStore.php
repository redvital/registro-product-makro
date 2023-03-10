<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class ShowStore extends Component
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
        $user = Auth::user();

        $stores = Store::where('name', 'like', '%' . $this->search . '%')
            ->where('address', 'like', '%' . $this->search . '%')
            ->when($user->hasRole('CLIENTE'), function ($query) use ($user) {
                return $query->where('id', $user->store_id);
            })
            ->withCount(['products' => function ($query) {
                $query->where('status_id', 1);
            }])
            ->orderBy($this->sort, $this->direction)
            ->paginate(10);
            
        return view('livewire.show-store', compact('stores'));
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
