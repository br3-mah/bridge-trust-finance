<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Mail\BTFAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.users.index')->only('index');
    //     $this->middleware('can:admin.users.edit')->only('edit', 'update');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    public function store(User $user, Request $request) 
    {
        DB::beginTransaction();
        try {
            // Role::firstOrCreate(['name' => 'employee']);
            //For demo purposes only. When creating user or inviting a user
            // you should create a generated random password and email it to the user        
            if ($request->file('image_path')) {
                $url = Storage::put('public/users', $request->file('image_path'));
            }
            
            // Hash::make($input['password']),
            $u = $user->create(array_merge($request->all(), [
                'password' => bcrypt('20230101brigde.@2you'),
                'active' => 1,
                'profile_photo_path' => $url ?? ''
            ]));

            $details = [
                'title' => 'Your account has been created successfully, please visit the site to login',
                'body' => 'Hi '.$u->fname.' '.$u->lname.' your current password is peace2u'
            ];

            $u->syncRoles($request->assigned_role);
            // Mail::to($u->email)->send(new SendUserInfoEmail($details));

            $mail = [
                'name' => $u->fname.' '.$u->lname,
                'to' => $u->email,
                'from' => 'admin@bridgetrustfinance.co.zm',
                'phone' => $u->phone,
                'subject' => 'Bridge Trust Finance Loan Application',
                'message' => 'Hey '.$u->fname.' '.$u->lname.' Your loan request has been sent, please sign in to see the application status. Your password is 20230101brigde.@2you',
            ];

            // dd($mail);
            $eMail = new BTFAccount($mail);
            Mail::to($u->email)->send($eMail);
            if($request->assigned_role == 'user'){
                $url = '/apply-for-a-loan/ '.$u->id;
                // $link = new HtmlString('<a target="_blank" href="' . $url . '">Create a loan for '.$u->fname.' '.$u->lname.'</a>');
                $msg = '<a target="_blank" href="'.$url.'">Apply for Loan on Behalf</a>';
                Session::flash('attention', "Borrower created successfully. ");
                Session::flash('borrower_id', $u->id);
            }else{
                Session::flash('attention', "User created successfully.");
            }
            DB::commit();
            return back();
        } catch (\Throwable $th) {
            DB::rollback();
            
            if($request->assigned_role == 'user'){
                Session::flash('error_msg', 'Oops.. There is a borrower account already using this email.');
            }elseif($request->assigned_role == 'employee'){
                Session::flash('error_msg', 'Oops. There is an employee account already with this email.');
            }else{
                Session::flash('error_msg', 'Oops.. An with this email already exists. please try again.');
            }
            return back();
        }

    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view ('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit', $user)->with('info', 'The role was successfully assigned.');
    }
}
