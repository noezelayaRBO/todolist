<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\UserTasks;
use App\Models\User;
use App\Models\Notes;
use App\Models\Daily;
use App\Models\Group;
use App\Models\Weekly;

class TaskController extends Controller
{
    public function welcome(){
        return view('welcome');
    }
    public function create($id){
        $user = UserTasks::all();
        return view('list.addtask', compact('user', 'id'));
    }
    public function store(){
        $data = request ()->validate([
            'nametask' => 'required|min:3',
        ]);
        $user = request('username');
        $task = new Task();
        $task->user_id = request('user');
        $task->name = request('nametask');
        $task->description = request('description');
        $task->date = request('date');
        $task->time = request('time');
        $task->save();
        return redirect('/mytask/'.$user);
        // dd($task);
        }
    public function show($user){
        $tasks = Task::where('user_id', $user)->get();
        $admin = Task::all();
        return view('list.show', compact('tasks','admin', 'user'));
    }
    public function edit($id){
        $task = Task::where('id', $id)->firstOrFail();
        $notes = Notes::where('id_tasks', $id)->get();
        
        return view('list.edit', compact('task','notes'));
    }
    public function update($id){
        $data = request ()->validate([
            'nametask' => 'required|min:3',
        ]);
        $info = [
            'user_id'=>request('user'),
            'name'=>request('nametask'),
            'description'=>request('description'),
            'time'=>request('time'),
            'date'=>request('date'),
        ];
        $task = Task::updateOrCreate(
            ['id'=> $id,], $info);
        return redirect('/homeuser');
        //dd($info);
    }
    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();
        $notes = Notes::where('id_tasks', '=', $id)->delete();
        return redirect('/mytask/' .$task->user.'');
    }
    
}
