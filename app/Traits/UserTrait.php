<?php

namespace App\Traits;

use App\Models\Application;
use App\Models\NextOfKing;
use App\Models\User;
use App\Models\Wallet;
use Illuminate\Support\Facades\Hash;

trait UserTrait{

    public function registerUser($input){
        $password = '20230101bridge.@2you';

        if($input['email'] != null){
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
                    Wallet::create([
                        'email' => $user->email ?? '',
                        'user_id' => $user->id
                    ]);
                    return $user;
                } catch (\Throwable $th) {
                    return redirect()->to('/already-exists');
                }
            }else{
                return redirect()->to('/already-exists');
            }
        }else{
            try {
                $user = User::create([
                    'fname' => $input['fname'],
                    'lname' => $input['lname'],
                    'password' => Hash::make($password),
                    'terms' => 'accepted'
                ]);
                $user->assignRole('user');
        
                // Get my applications
                Wallet::create([
                    'email' => $user->email ?? '',
                    'user_id' => $user->id
                ]);
                return $user;
            } catch (\Throwable $th) {
                return redirect()->to('/already-exists');
            }
        }

        
    }

    public function createNOK($data){
        NextOfKing::create([
            'email' => $data['nok_email'],
            'fname' => $data['nok_fname'],
            'lname' => $data['nok_lname'],
            'phone' => $data['nok_phone'],
            'address' => $data['nok_relation'],
            'gender' => $data['nok_gender'],
            'user_id' => $data['user_id']
        ]);
    }

    public function updateNOK($data){
        NextOfKing::where('user_id', '=', $data['user_id'])->delete();
        NextOfKing::create([
            'email' => $data['nok_email'],
            'fname' => $data['nok_fname'],
            'lname' => $data['nok_lname'],
            'phone' => $data['nok_phone'],
            'address' => $data['nok_relation'],
            'gender' => $data['nok_gender'],
            'user_id' => $data['user_id']
        ]);
    }
}

