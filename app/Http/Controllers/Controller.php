<?php

namespace App\Http\Controllers;

use App\Models\task;
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

        if (request()->has('image')){
            $task->update([
                'image' => request()->image->store('uploads','public'),
            ]);
            //$image = Image::make(public_path('storage/' . $customer->image))->crop(300, 300);
            //$image = Image::make(public_path('storage/' . $task->image))->fit(300, 300);
            //$image->save();
            }
        return redirect('/homeuser');
        // Task::create($request->all());
        // return json_encode(array(
        //     "statusCode"=>200
        // ));
        }
    public function show($user){
        $tasks = Task::where('user', $user)->get();
        //dd($tasks);
        return view('list.show', compact('tasks'));
    }
    public function edit($id){
        $task = Task::where('id', $id)->firstOrFail();
        //dd($task);
        return view('list.edit', compact('task'));
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
        return redirect('/');
    }
}
