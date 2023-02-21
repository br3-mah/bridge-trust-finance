<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

trait UserTrait{

    public function registerUser($input){
        $password = '20230101brigde.@2you';
        $check = User::where('email', $input['email'])->first();
        if($check == null){
            try {
                $user = User::create([
                    'fname' => $input['fname'],
                    'lname' => $input['lname'],
                    'email' => $input['email'],
                    'password' => Hash::make($password),
                    'terms' => 'accepted'
                ]);
                $user->assignRole('user');
        
                // Get my applications
                Application::where('email', $input['email'])->update(['user_id' => $user->id]);
                Wallet::where('email', $input['email'])->get()->toArray();
                if(!empty($wallet)){
                    Wallet::where('email', $input['email'])->update(['user_id' => $user->id]);
                }
                return $user;
            } catch (\Throwable $th) {
                return redirect()->to('/already-exists');
            }
        }else{
            return false;
        }
        
    }
}

