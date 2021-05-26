<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\UserTasks;
use App\Models\User;
use App\Models\Notes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Policies\ListPolicy;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function welcome(){
        return view('welcome');
    }
    public function create($id){
        $user = UserTasks::all();
        return view('list.addtask',compact('user', 'id'));
    }
    public function store(){
        $data = request ()->validate([
            'nametask' => 'required|min:3',
            'status' => 'required'
        ]);
        $task = new Task();
        $task->user = request('user');
        $task->name = request('nametask');
        $task->description = request('description');
        $task->status = request('status');
        $task->image = request('image');
        $task->save();
        return redirect('/homeuser');
        }
    public function show($user){
        $tasks = Task::where('user', $user)->orderBy('status')->get();
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
            'status' => 'required'
        ]);
        $info = [
            'user'=>request('user'),
            'name'=>request('nametask'),
            'description'=>request('description'),
            'status'=>request('status'),
            'image'=>request('image'),
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
        return redirect('/homeuser');
    }
    public function storenotes($id){
        $validate = request()->validate([
            'notes' => 'required',
        ]);
        $notes = new Notes();
        $notes->id_tasks = $id;
        $notes->notes = request('notes');
        $notes->save();
        return redirect('/edit/' .$id.'');
        // Notes::create($request->all());
        // return json_encode(array(
        //     "statusCode"=>200
        // ));
    }
}
