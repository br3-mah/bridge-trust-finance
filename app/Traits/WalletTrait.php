<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\LoanWallet;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
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

    public function deposit($amount, $loan){
        $due = Carbon::now()->addMonth($loan->repayment_plan);
        try{
            // Add the principal amount
            $userWallet = Wallet::where('user_id', $loan->user_id)->first();      
            $userWallet->deposit = $amount;
            $userWallet->save();

            // Withdraw from Main Wallet
            $mainWallet = LoanWallet::get()->first();        
            $mainWallet->withraw = $amount;
            $mainWallet->save();

            // Depricated
            Application::where('user_id', $loan->user_id)->first()->update([
                'due_date' => $due
            ]);
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }

    public function withdraw($amount, $loan){
        try{
            // remove from user
            $userWallet = Wallet::where('user_id', $loan->user_id)->first();      
            if($userWallet->deposit > 0){
                $userWallet->deposit = $userWallet->deposit - $amount;
                $userWallet->save();

                // Deposit back in Main Wallet
                $mainWallet = LoanWallet::get()->first();        
                $mainWallet->withraw = $mainWallet->withraw - $amount;
                $mainWallet->save();

                $mainWallet2 = LoanWallet::get()->first();        
                $mainWallet2->deposit = $mainWallet2->deposit + $amount;
                $mainWallet2->save();
                
                Application::where('user_id', $loan->user_id)->first()->update([
                    'due_date' => ''
                ]);
            }
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }
    public function repayLoanWalletFunds($amount){
        try {
            $mainWallet = LoanWallet::get()->first();        
            $mainWallet->deposit = $mainWallet->deposit + $amount;
            $mainWallet->save();
            return true;
        } catch (\Throwable $th) {
            dd($th);
        }
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

    public function getWithdrawRequests(){
        try {
            // dd(Auth::user()->hasRole('user'));
            // if(Auth::user()->hasRole('user')){
                return WithdrawRequest::with('user')->where('status', 0)->get();
            // }else{
                // return WithdrawRequest::where('user_id', auth()->user()->id)->with('user')->where('status', 0)->get();
            // }
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function deductUserWallet($data){
        $userWallet = Wallet::where('user_id', $data->user_id)->first();      
        if($userWallet->deposit > 0){
            $userWallet->deposit = $userWallet->deposit - $data->amount;
            $userWallet->save();
            return true;
        }
        return false;
    }
}