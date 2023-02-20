<?php

namespace App\Http\Livewire\Dashboard\Settings;

use App\Models\ContactSetting;
use Livewire\Component;

class ContactSettings extends Component
{
    public $name, $slogan, $phone1, $phone2, $phone3, $address, $email, $city, $state, $province, $business_type, $legal_structure, $contacts;

    public function render()
    {
        $this->contacts = ContactSetting::first();
        return view('livewire.dashboard.settings.contact-settings')
        ->layout('layouts.dashboard');
    }
    
    public function store(){

        ContactSetting::createOrUpdate([
            ['id' => 1],
            'name' => $this->name, 
            'slogan' => $this->slogan, 
            'phone1' => $this->phone1, 
            'phone2'=> $this->phone2, 
            'phone3'=> $this->phone3, 
            'address' => $this->address, 
            'email1'=> $this->email, 
            'city' => $this->city, 
            'province'=> $this->state,
            'business_type'=> $this->state,
            'legal_structure'=> $this->state,
            'facebook'=> $this->facebook,
            'instagram'=> $this->instagram,
            'twitter'=> $this->twitter,
            'linkedin'=> $this->linkedin
        ]);
        session()->flash('message', 'Loan rate created successfully.');
    }

    public function edit($id){

    }

    public function update($id){

    }

    public function destroy($id){
        
    }
}
