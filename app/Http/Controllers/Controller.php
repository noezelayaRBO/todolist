<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function welcome(){
        return view('welcome');
    }
    public function create(){
        return view('list.addtask');
    }
    public function store(){
        //
    }
    public function contact(){
        return view('contact');
    }
    public function show(){
        return view('list.show');
    }
    public function update(){
        return view('list.edit');
    }
}
