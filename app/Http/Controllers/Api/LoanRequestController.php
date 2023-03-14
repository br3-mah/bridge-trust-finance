<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Wallet;
use App\Models\WithdrawRequest;
use App\Traits\EmailTrait;
use App\Traits\WalletTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoanRequestController extends Controller
{
    use EmailTrait, WalletTrait;

    public function getMyLoans($id){
        $data = Application::with('loan')
        ->where('user_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        return response()->json(['data' => $data]);
    }
    
    public function makeWithdrawalRequest(Request $request){
        try {
            $uuid = Str::orderedUuid();
            WithdrawRequest::create([
                'wallet_id' => Wallet::where('user_id', $request['user_id'])->first()->id,
                'amount' => $request['withdraw_amount'],
                'ref' => substr($uuid, 0, 6),
                'withdraw_method' => $request['payment_method'],
                'mobile_number' => $request['mobile_number'],
                'card_name' => $request['card_name'],
                'bank_name' => $request['bank_name'],
                'comments' => 'You have received a new wallet withdraw request',
                'card_number' => $request['card_number'],
                'user_id' =>  $request['user_id']
            ]);
    
            return response()->json(['message' => 'Your withdraw request has been sent']);
        } catch (\Throwable $th) {    
            return response()->json(['message' => 'Failed']);
        }
    }
    
    public function getWithdrawalRequests($id){
        $requests = $this->getWithdrawRequests();
        return response()->json(['data' => $requests]);
    }
    
    public function getWallets($id){
        $wallet = $this->getUserWallet($id);
        return response()->json(['amount' => $wallet]);
    }

    public function createLoan(Request $request){

    }
}
