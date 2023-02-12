<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\LoanWallet;
use App\Models\Wallet;
use Carbon\Carbon;

trait WalletTrait{

    public function getWalletBalance($user_id){
        return Wallet::where('user_id', $user_id)->first()->deposit ?? 0;
    }

    public function deposit($amount, $x){
        
        $due = Carbon::now()->addMonth($x->repayment_plan);

        if($x->user_id == ''){
            Wallet::updateOrCreate([
                'email' => $x->email,
                'deposit' => $amount
            ]);
            Application::where('email', '=', $x->email)->first()->update([
                'due_date' => $due
            ]);
            return true;
        }

        Wallet::updateOrCreate([
            'user_id' => $x->user_id,
            'deposit' => $amount
        ]);
        Application::where('user_id', '=', $x->user_id)->first()->update([
            'due_date' => $due
        ]);
        return true;
    }

    public function withdrawal($amount, $user){

    }

    public function updateLoanWalletFunds($amount){
        try {
            LoanWallet::create([
                'deposit' => $amount
            ]);
            return true;
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}