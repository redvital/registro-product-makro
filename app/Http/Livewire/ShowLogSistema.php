<?php


namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\LogSistema;

class ShowLogSistema extends Component
{
    protected $paginationTheme = "bootstrap";
    use WithPagination;
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    protected $listeners = ['render' => 'render'];

    public function updatingSearch()
    {
        $this->resetPage();
    }
    

    public function render()
    {
        $logs = LogSistema::where('id', 'like', '%' . $this->search . '%')
                   ->orWhere('user_id', 'like', '%' . $this->search . '%')
                   ->orWhere('tx_descripcion', 'like', '%' . $this->search . '%')
                   ->orderBy($this->sort, $this->direction)
                   ->paginate(10);
                   
        return view('livewire.show-log-sistema', compact('logs'));
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
