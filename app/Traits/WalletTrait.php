<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\LoanWallet;
use App\Models\Wallet;
use Carbon\Carbon;

trait WalletTrait{

    public function getCompanyWallet(){
        $deposit = LoanWallet::sum('deposit') ?? 0;
        $withdrawn = LoanWallet::sum('withraw') ?? 0;
        return $deposit - $withdrawn;
    }

    public function isCompanyEnough($amount){
        $deposit = LoanWallet::sum('deposit') ?? 0;
        $withdrawn = LoanWallet::sum('withraw') ?? 0;
        $x = $deposit - $withdrawn;
        $chk = $x - $amount;
        if($x > 0){
            return true;
        }else{
            return false;
        }
    }

    public function getWalletBalance($user){
        if($user->hasRole('admin')){
            return $this->getCompanyWallet() ?? 0;
        }else{
            return Wallet::orWhere('user_id', $user->id)
                        ->orWhere('email', $user->email)->first()->deposit ?? 0;
        }
    }

    public function deposit($amount, $x){
        
        
        $due = Carbon::now()->addMonth($x->repayment_plan);
        // dd($due);
        // dd($x);
        if($x->user_id == ''){
            Wallet::updateOrCreate([
                'email' => $x->email,
                'deposit' => $amount
            ]);            
            LoanWallet::first()->update([
                'withraw' => $amount
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
        LoanWallet::first()->update([
            'withraw' => $amount
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