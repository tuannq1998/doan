<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function home()
    {
        return view('admin.home');
    }

    public function login(Request $request)
    {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('admins')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result)
        {
            Session::put('admin_name', $result->admin_name);
            Session::put('id', $result->id);

            return Redirect::route('admin.home');
        }else{
            Session::put('message', 'wrong account and password');
            return Redirect::route('admin');
        }

    }
    public function logout()
    {
        Session::put('admin_name', null);
        Session::put('id', null);
        return Redirect::route('admin');
    }
}
