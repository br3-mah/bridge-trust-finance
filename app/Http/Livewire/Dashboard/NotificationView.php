<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class NotificationView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.notification-view')
        ->layout('layouts.dashboard');
    }
}
