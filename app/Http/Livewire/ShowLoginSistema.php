<?php


namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Login;

class ShowLoginSistema extends Component
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
        $logins = Login::where('id', 'like', '%' . $this->search . '%')
                   ->orWhere('user_id', 'like', '%' . $this->search . '%')
                   ->orWhere('user_agent', 'like', '%' . $this->search . '%')
                   ->orWhere('ip_address', 'like', '%' . $this->search . '%')
                   ->orWhere('login_at', 'like', '%' . $this->search . '%')
                   ->orWhere('logout_at', 'like', '%' . $this->search . '%')
                   ->orderBy($this->sort, $this->direction)
                   ->paginate(10);
                   
        return view('livewire.show-login-sistema', compact('logins'));
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
