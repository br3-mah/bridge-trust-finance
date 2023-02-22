<?php

namespace App\Http\Livewire\Dashboard\Loans;

use Livewire\Component;

class EligibilityScoreView extends Component
{
    public function render()
    {
        return view('livewire.dashboard.loans.eligibility-score-view')->layout('layouts.dashboard');
    }
}
