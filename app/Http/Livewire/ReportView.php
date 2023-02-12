<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ReportView extends Component
{
    public $url, $results, $type, $start_date, $end_date, $today, $next;
    public function render()
    {
        $this->results = [];
        $this->next = Carbon::now()->addMonth(2);
        $this->today = Carbon::now();
        $this->url = FacadesRoute::currentRouteName();
        return view('livewire.report-view')
        ->layout('layouts.dashboard');
    }

    public function searchEarlySettlements(){
        try{
            
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
        }
    }
}
