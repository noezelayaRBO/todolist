<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\UserTasks;
use App\Models\User;
use App\Models\Notes;

class NoteController extends Controller
{
    public function storenotes($id){
        $validate = request()->validate([
            'notes' => 'required',
        ]);
        $notes = new Notes();
        $notes->id_tasks = $id;
        $notes->notes = request('notes');
        $notes->save();
        return redirect('/edit/' .$id);
        // Notes::create($request->all());
        // return json_encode(array(
        //     "statusCode"=>200
        // ));
    }
    public function updatenote($id, $task)
    {
        $request = request();
        dd($request);
        $validate = request()->validate([
            'newnote' => 'required',
        ]);
        $info = [
            'id'=>$id,
            'id_tasks'=>$task,
            'notes'=>request('newnote'),
        ];
        // 'valuenote'.$id.''
        dd($info);
        dd(request());
        // $notes = Notes::updateOrCreate(
        //     ['id'=> $id,], $info);
        // return redirect('/edit/' .$task.'');
    }
    public function destroynote($id, $task)
    {
        $notes = Notes::findOrFail($id);
        $notes->delete();
        // dd($id, $task);
        return redirect('/edit/' .$task.'');
    }
}
