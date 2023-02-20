<?php

namespace App\Http\Livewire\Dashboard\Settings;

use App\Models\CareerSetting;
use Livewire\Component;

class CareerSettings extends Component
{
    public $dept, $job_role, $location, $last_date, $desc, $careers;
    public function render()
    {
        $this->careers = CareerSetting::get();
        return view('livewire.dashboard.settings.career-settings')
        ->layout('layouts.dashboard');
    }

    public function store(){
        // $this->validate([
        //     'dept' => 'required',
        //     'job_role' => 'required',
        //     'location' => 'required',
        //     'last_date' => 'required'
        // ]);
        CareerSetting::create([
            'dept' => $this->dept, 
            'job_role' => $this->job_role, 
            'location' => $this->location, 
            'last_date' => $this->last_date, 
            'desc' => $this->desc ?? $this->job_role
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
