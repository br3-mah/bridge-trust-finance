<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

trait UserTrait{

    public function registerUser($input){
        $password = 'peace2u';
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
            dd($th);
        }
    }
}

