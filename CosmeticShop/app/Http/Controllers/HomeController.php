<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;

class HomeController extends Controller
{
    public function index(){
        return view('pages.home');
    }
}
