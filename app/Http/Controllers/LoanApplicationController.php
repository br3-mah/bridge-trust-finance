<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\File;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;

class LoanApplicationController extends Controller
{     
    use EmailTrait, LoanTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->toArray();
        // if($request->file('nrc_file') != null){
        //     $nrc_file = $request->file('nrc_file')->store('nrc_file', 'public');                     
        // }
        if($request->file('tpin_file') != null){               
            $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');                
        }
        if($request->file('payslip_file') != null){               
            $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');         
        }

        $data = [
            'lname'=> $form['lname'],
            'fname'=> $form['fname'],
            'email'=> $form['email'],
            'amount'=> $form['amount'],
            'phone'=> $form['phone'],
            'gender'=> $form['gender'],
            'type'=> $form['type'],
            'complete'=> 1,
            'repayment_plan'=> $form['repayment_plan'],

            'glname'=> $form['glname'],
            'gfname'=> $form['gfname'],
            'gemail'=> $form['gemail'],
            'gphone'=> $form['gphone'],
            'g_gender'=> $form['g_gender'],
            'g_relation'=> $form['g_relation'],

            'g2lname'=> $form['g2lname'],
            'g2fname'=> $form['g2fname'],
            'g2email'=> $form['g2email'],
            'g2phone'=> $form['g2phone'],
            'g2_gender'=> $form['g2_gender'],
            'g2_relation'=> $form['g2_relation'],
            // 'nrc_file' => $nrc_file,
            'tpin_file' => $tpin_file,
            'payslip_file' => $payslip_file
        ];
        $application = $this->apply_loan($data);
        $mail = [
            'user_id' => '',
            'application_id' => $application,
            'name' => $form['fname'].' '.$form['lname'],
            'loan_type' => $form['type'],
            'phone' => $form['phone'],
            'duration' => $form['repayment_plan'],
            'amount' => $form['amount'],
            'type' => 'loan-application',
            'msg' => 'You have new a '.$form['type'].' loan application request, please visit the site to view more details'
        ];

        $process = $this->send_loan_email($mail);

        if($request->wantsJson()){
            return response()->json([
                "status" => 200, 
                "success" => true, 
                "message" => "Your loan has been sent.", 
                "data" => $application
            ]);
        }else{
            if($process){
                return redirect()->to('/successfully-applied-a-loan');
            }else{
                return redirect()->to('/contact-us');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
