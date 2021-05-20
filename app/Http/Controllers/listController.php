<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index(){
        
        return view('welcome');
    }
}
