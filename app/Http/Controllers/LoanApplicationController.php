<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\File;
use App\Traits\EmailTrait;
use App\Traits\LoanTrait;
use App\Traits\UserTrait;
use Illuminate\Support\Facades\DB;

class LoanApplicationController extends Controller
{     
    use EmailTrait, LoanTrait, UserTrait;
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
    public function getLoan(Request $req)
    {
        $email = $req->toArray()['email']; 
        $application = User::where('email', $email)->get()->toArray();  
        // $application = Application::where('email', $email)
        //                             ->where('status', 0)
        //                             ->where('can_change', 0)->get()->first();             
        if(!empty($application)){
            $data = 1;
            return response()->json($data, 200);
        }else{
            $data = 0;
            return response()->json($data, 200);
        }
    }

    public function updateExistingLoan(Request $req)
    {
        $email = $req->toArray()['email']; 
        try{
            Application::where('email', $email)->update(['can_change' => 1]);
            $data = 1;
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            $data = 0;
            return response()->json($data, 500);
        }
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
        
        if($request->file('tpin_file') !== null){               
            $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');                
        }

        if($request->file('payslip_file') !== null){               
            $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');         
        }

        $register = [
            'lname'=> $form['lname'],
            'fname'=> $form['fname'],
            'email'=> $form['email'],
            'password' => 'peace2u',
            'terms' => 'accepted'
        ];
        $user = $this->registerUser($register);
        if(!$user){
            return redirect()->to('/account-already-exists');
        }
        $data = [
            'lname'=> $form['lname'],
            'fname'=> $form['fname'],
            'email'=> $form['email'],
            'amount'=> $form['amount'],
            'phone'=> $form['phone'],
            'gender'=> $form['gender'],
            'type'=> $form['type'],
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

            'tpin_file' => $tpin_file ?? 'no file',
            'payslip_file' => $payslip_file ?? 'no file',
            'user_id' =>  $user->id,
            'complete' => 0
        ];


        $application = $this->apply_loan($data);

        $mail = [
            'user_id' => $user->id,
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

    public function updateFiles(Request $request)
    {
        DB::beginTransaction();
        $i = auth()->user();   
        try {
            if($request->file('nrc_file') !== null){
                $nrc_file = $request->file('nrc_file')->store('nrc_file', 'public'); 
                $user = Application::where('user_id',auth()->user()->id)->where('status', 0)->where('complete', 0)->first();
                $user->nrc_file = $nrc_file;
                $user->save();      
            }
    
            if($request->file('tpin_file') !== null){               
                $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');   
                $user = Application::where('user_id',auth()->user()->id)->where('status', 0)->where('complete', 0)->first();
                $user->tpin_file = $tpin_file;
                $user->save();           
            }
    
            if($request->file('payslip_file') !== null){               
                $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');  
                $user = Application::where('user_id',auth()->user()->id)->where('status', 0)->where('complete', 0)->first();
                $user->payslip_file = $payslip_file;
                $user->save();        
            }

            if($i->id_type !== null && $i->net_pay !== null && $i->basic_pay !== null && $i->address !== null && $i->phone !== null && $i->occupation !== null && $i->gender !== null && $i->nrc_no !== null && $i->dob !== null){
                $loan = Application::where('status', 0)->where('complete', 0)
                            ->where('user_id', auth()->user()->id)->first();
                            
                if($loan !== null){
                    if($loan->tpin_file !== 'no file' && $loan->payslip_file !== 'no file' && $loan->nrc_file !== null){
                        $loan->complete = 1;
                        $loan->save();
                        
                        return redirect()->to('/dashboard');
                    }
                }
            }
            
            DB::commit();
            return redirect()->to('/user/profile');
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->to('/user/profile');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function new_loan(Request $request)
    {

        DB::beginTransaction();
        // dd('here');
        try {
            $form = $request->toArray();
            // dd($form);
            if($request->file('tpin_file') !== null){               
                $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');                
            }
    
            if($request->file('payslip_file') !== null){               
                $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');         
            }
    
            $data = [
                'user_id'=> auth()->user()->id,
                'lname'=> $form['lname'],
                'fname'=> $form['fname'],
                'email'=> $form['email'],
                'amount'=> $form['amount'],
                'phone'=> $form['phone'],
                'gender'=> $form['gender'],
                'type'=> $form['type'],
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
    
                'tpin_file' => $tpin_file ?? 'no file',
                'payslip_file' => $payslip_file ?? 'no file',
    
                'complete' => 0
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
                    DB::commit();
                    return redirect()->back();
                }else{
                    DB::commit();
                    return redirect()->back();
                }
            }  
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->back();
        }     
    }


    public function new_proxy_loan(Request $request)
    {
        DB::beginTransaction();
        try {
            $form = $request->toArray();
            if($request->file('tpin_file') !== null){               
                $tpin_file = $request->file('tpin_file')->store('tpin_file', 'public');                
            }
    
            if($request->file('payslip_file') !== null){               
                $payslip_file = $request->file('payslip_file')->store('payslip_file', 'public');         
            }
    
            $user = User::where('id', $form['borrower_id'])->first();
            $data = [
                'user_id'=> $form['borrower_id'],
                'lname'=> $user->lname,
                'fname'=> $user->fname,
                'email'=> $user->email,
                'amount'=> $form['amount'],
                'phone'=> $user->phone,
                'gender'=> $user->gender,
                'type'=> $form['type'],
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
    
                'tpin_file' => $tpin_file ?? 'no file',
                'payslip_file' => $payslip_file ?? 'no file',
                
                'processed_by'=> auth()->user()->id
            ];
            
            if($form['bypass']){
                $data['complete'] = 1;
            }else{
                $data['complete'] = 0;
            }

            $application = $this->apply_loan($data);
            $mail = [
                'user_id' => '',
                'application_id' => $application,
                'name' => $user->fname.' '.$user->lname,
                'loan_type' => $form['type'],
                'phone' => $user->phone,
                'duration' => $form['repayment_plan'],
                'amount' => $form['amount'],
                'type' => 'loan-application',
                'msg' => 'You have new a '.$form['type'].' loan application reques from '.$user->fname.' '.$user->lname.', please visit the site to view more details'
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
                    DB::commit();
                    return redirect()->back();
                }else{
                    DB::commit();
                    return redirect()->back();
                }
            } 
        } catch (\Throwable $th) {
            // dd($th);
            DB::rollback();
            return redirect()->back();
        }      
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
