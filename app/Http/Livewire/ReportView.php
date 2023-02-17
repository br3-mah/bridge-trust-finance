<?php

namespace App\Http\Livewire;

use App\Models\Application;
use Carbon\Carbon;
use Illuminate\Routing\Route;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route as FacadesRoute;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ReportView extends Component
{
    public $url, $results, $type, $start_date, $end_date, $today, $next;
    public function render()
    {
        $this->next = Carbon::now()->addMonth(2);
        $this->today = Carbon::now();
        $this->url = FacadesRoute::currentRouteName();
        return view('livewire.report-view')
        ->layout('layouts.dashboard');
    }

    public function searchEarlySettlements(){
        // $this->results = Application::where('')
        try{
            if($this->type == 1){
                // Early Settlement
                if(isset($this->start_date) && isset($this->end_date)){
                    $this->results = Application::where('date_settled', '>' ,'due_date')
                    ->whereBetween('created_at', [$this->start_date, $this->end_date])
                    ->get();
                }else{
                    $this->results = Application::where('date_settled', '>' ,'due_date')->get();
                    // dd($this->results);
                }
            }
            
            if($this->type == 2){
                // Late Settlements
                if(isset($this->start_date) && isset($this->end_date)){
                    $this->results = Application::where('date_settled', '<' ,'due_date')
                    ->whereBetween('created_at', [$this->start_date, $this->end_date])
                    ->get();
                }else{
                    $this->results = Application::where('date_settled', '<' ,'due_date')->get();
                }
            }
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
        }
    }

    public function downloadSectionAsWord($id){
        // Render the Blade template section to HTML content
        $htmlContent = View::make('livewire.report-view')->render();

        // Convert the HTML content to a Word document
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $htmlContent);

        // Download the Word document
        $filename = 'example.docx';
        $headers = [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->streamDownload(function () use ($phpWord) {
            IOFactory::createWriter($phpWord, 'Word2007')->save('php://output');
        }, $filename, $headers);
    }
}
