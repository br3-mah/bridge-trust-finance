<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class DashboardView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.dashboard-view')
        ->layout('layouts.dashboard');
        // ->slot('div');
    }
}
