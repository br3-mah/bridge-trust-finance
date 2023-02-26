<?php

namespace App\Http\Livewire;

use App\Models\WithdrawRequest;
use App\Traits\WalletTrait;
use Livewire\Component;

class WithdrawRequestView extends Component
{
    use WalletTrait;
    public $requests;

    public function render()
    {
        $this->requests = $this->getWithdrawRequests();
        return view('livewire.withdraw-request-view')
        ->layout('layouts.dashboard');
    }

    public function acceptTransaction($id){
        $info = $this->getWithdrawRequests()->where('id', $id)->first();
        $x = WithdrawRequest::with('user')->where('user_id', $info->user_id)->first();  
        $x->status = 1;
        $x->save();
        $this->deductUserWallet($info);
        session()->flash('success', 'Successfully withdrawn '.$x->amount.' from '.$x->user->fname.' '.$x->user->lname."'s wallet");

    }

    public function denyTransaction($id){
        
    }
}
