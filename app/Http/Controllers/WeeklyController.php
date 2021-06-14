<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\UserTasks;
use App\Models\User;
use App\Models\Notes;
use App\Models\Daily;
use App\Models\Weekly;
use App\Mail\WeeklyMail;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;

class WeeklyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $data = request ()->validate([
            'name' => 'required|min:3',
            'time' => 'required',
        ]);
        $weeklyuser = request('userid');
        $weekly = new Weekly();
        $weekly->user_id = request('user');
        $weekly->name = request('name');
        $weekly->description = request('description');
        $weekly->time = request('time');
        $weekly->day = request('day');
        $weekly->save();
        $details = request('email');
        \Mail::to($details)->send(new \App\Mail\WeeklyMail($weekly));
        // dd($weekly);
        // dd(request());
        return redirect('/weekly/'.$weeklyuser);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($weekly)
    {
        $user = UserTasks::all();
        $weeklytask = Weekly::where('user_id', $weekly)->get();
        $monday = Weekly::monday()->where('user_id', $weekly)->orderBy('time')->get();
        $tuesday = Weekly::tuesday()->where('user_id', $weekly)->orderBy('time')->get();
        $wednesday = Weekly::wednesday()->where('user_id', $weekly)->orderBy('time')->get();
        $thursday = Weekly::trusday()->where('user_id', $weekly)->orderBy('time')->get();
        $friday = Weekly::friday()->where('user_id', $weekly)->orderBy('time')->get();
        $saturday = Weekly::saturday()->where('user_id', $weekly)->orderBy('time')->get();
        $sunday = Weekly::sunday()->where('user_id', $weekly)->orderBy('time')->get();
        // dd($user, $weekly);
        return view('weekly.index', compact('user', 'weekly', 'weeklytask', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($weekly)
    {
        $info = Weekly::findOrFail($weekly);
        $user = UserTasks::all();
        // dd($info);
        return view('weekly.edit',compact('info', 'user', 'weekly'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $weekly)
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'time' => 'required',
        ]);
        $weeklyuser = request('userid');

        $info = [
            'user_id' => request('user'),
            'name' => request('name'),
            'description' => request('description'),
            'time' => request('time'),
            'day' => request('day'),
        ];
        $weeklytask = Weekly::updateOrCreate([
            'id'=>$weekly,
            ],$info);
        
        return redirect('/weekly/'.$weeklyuser);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($weekly)
    {
        $weeklytask = Weekly::findOrFail($weekly);
        $weeklytask->delete();
        $id = request('id_user');
        return redirect('/weekly/'.$id);
    }
    public function showweekly($weekly)
    {
        // $info = Weekly::where('id', $weekly)->get();
        $info = Weekly::findOrFail($weekly);
        return view('weekly.showweekly', compact('info', 'weekly'));
        // dd($info, $weekly);
        
    }
}
