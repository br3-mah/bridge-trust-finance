<?php

namespace App\Http\Livewire\Dashboard\Accounts;

use App\Models\BlackList;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Livewire\Component;

class AccountView extends Component
{
    public $data, $key;
    public function mount(){
        $this->key = $_GET['key'];
    }
    public function render()
    {
        $this->data = $this->searchAccount($this->key);
        return view('livewire.dashboard.accounts.account-view')
        ->layout('layouts.dashboard');
    }

    public function searchAccount($key){
        return User::where('id', $key)
              ->orWhere('fname', $key)
              ->orWhere('lname', $key)
              ->orWhere('email', $key)
              ->orWhere('nrc', $key)->with('loans')->with('wallet')->with('blacklist')->get()->first();
    }

    public function blockUser(){
        try {
            BlackList::create([
                'user_id' => $this->data->id,
                'email' => $this->data->email,
                'comments' => 'Blacklisted'
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function unblockUser(){
        BlackList::where('user_id', $this->data->id)->first()->delete();
    }
}
