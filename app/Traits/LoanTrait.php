<?php

namespace App\Traits;

use App\Models\Application;

trait LoanTrait{

    public $application;

    // public function __construct(Application $a){
    //     $this->application = $a;
    // }

    public function apply_loan($data){
            try {
                $item = Application::create($data);
                return $item->id;
            } catch (\Throwable $th) {
                return false;
            }
    }

    public function accept_loan($id){

    }

    public function reject_loan($id){

    }

    public function payback_loan($id){

    }

    public function search_loan($id){
        
    }

}