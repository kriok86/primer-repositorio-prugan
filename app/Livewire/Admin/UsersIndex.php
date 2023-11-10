<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    protected $paginationTheme=('bootstrap');

    //public $search='';
    public $search;
 
    
    
    public function render()
    {
        $users= User::where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('email','like', '%'.$this->search.'%')
                    ->paginate(4);
        
        return view('livewire.admin.users-index', compact('users'));
    }

    public function limpiar_page(){
        $this->reset('paginators');
    }
   
}
