<?php


namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()->hasRole('administrator')){
            return view('dashboard-admin');
        } else {
            return view('dashboard');
        }
    }
}
