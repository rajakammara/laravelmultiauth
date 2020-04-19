<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Admin;
use Auth;

class ChangePasswordController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    public function index()
    {

        return view('/admins.admin-change-password');

    } 
    public function store(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        Admin::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

   

        Auth::logout();
        return Redirect::to("/login/admin");

    }
    public function storeuser(Request $request)

    {

        $request->validate([

            'current_password' => ['required', new MatchOldPassword],

            'new_password' => ['required'],

            'new_confirm_password' => ['same:new_password'],

        ]);

   

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

   

        Auth::logout();
        return Redirect::to("/login");

    }
}
