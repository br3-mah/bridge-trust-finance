<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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
        try {
            //For demo purposes only. When creating user or inviting a user
            // you should create a generated random password and email it to the user        
            if ($request->file('image_path')) {
                $url = Storage::put('public/users', $request->file('image_path'));
            }
            
            $u = $user->create(array_merge($request->all(), [
                'password' => bcrypt('peace2u'),
                'active' => 1,
                'profile_photo_path' => $url ?? ''
            ]));

            $details = [
                'title' => 'Your account has been created successfully, please visit the site to login',
                'body' => 'Hi '.$u->fname.' '.$u->lname.' your current password is peace2u'
            ];

            $u->syncRoles($request->assigned_role);
            // Mail::to($u->email)->send(new SendUserInfoEmail($details));
            Session::flash('attention', "User created successfully.");
            return redirect()->route('users')
                ->withSuccess(__('User created successfully.'));
        } catch (\Throwable $th) {
            Session::flash('error_msg', substr($th->getMessage(),16,110));
            return redirect()->route('users');
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
