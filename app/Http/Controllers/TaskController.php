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
        $task->end = request('datefinish');
        $task->complete = 0;
        $task->save();
        return redirect('/mytask/'.$user);
        // dd($task);
        }
    public function show($user){
        $tasks = Task::incomplete()->where('user_id', $user)->orderBy('date')->get();
        $admin = Task::all();
        $completed = Task::completed()->where('user_id', $user)->orderBy('date')->get();
        return view('list.show', compact('tasks','admin', 'user', 'completed'));
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
        $user = request('user');
        $info = [
            'user_id'=>request('user'),
            'name'=>request('nametask'),
            'description'=>request('description'),
            'date'=>request('date'),
            'complete'=>0,
            'end'=>request('end'),
        ];
        $task = Task::updateOrCreate(
            ['id'=> $id,], $info);
        return redirect('/mytask/'.$user);
        //dd($info);
    }
    public function destroy($id){
        $task = Task::findOrFail($id);
        $task->delete();
        $notes = Notes::where('id_tasks', '=', $id)->delete();
        $user = request('usertask');
        return redirect('/mytask/' .$user);
    }
    public function complete($id){
        $info = [
            'user_id'=>request('user_id'),
            'name'=>request('name'),
            'description'=>request('description'),
            'time'=>request('time'),
            'date'=>request('date'),
            'complete'=>1,
            'end'=>request('end'),
        ];
        $user = request('user_id');
        $task = Task::updateOrCreate(
            ['id'=> $id,], $info);
        return redirect('/mytask/'.$user);        
    }
    
}
